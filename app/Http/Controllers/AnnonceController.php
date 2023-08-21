<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
        public function index()
        {
            $annonces = Annonce::all();
            return view('annonce.index', compact('annonces'));
        }

        public function create()
        {
            $annonce = new Annonce();
            return view('annonce.create',compact('annonce'));
        }

        public function store(Request $request)
        {
            $annonce = Annonce::create($request->all());
            return redirect()->route('annonces.show', $annonce->id);
        }

        public function show($id)
        {
            $annonce = Annonce::find($id);
            return view('annonce.show', compact('annonce'));
        }

        public function edit(Annonce $annonce)
        {
            return view('annonce.edit', compact('annonce'));
        }


        public function update(Request $request, Annonce $annonce)
        {
            $neuf = $request->has('neuf'); 
        
            $annonce->update([
                'titre' => $request->input('titre'),
                'description' => $request->input('description'),
                'type' => $request->input('type'),
                'ville' => $request->input('ville'),
                'superficie' => $request->input('superficie'),
                'neuf' => $neuf, 
                'prix' => $request->input('prix'),
            ]);
        
            return redirect()->route('annonces.show', $annonce->id);
        }
    
            public function destroy(Annonce $annonce)
            {
                $annonce->delete();
                return redirect()->route('annonces.index');
            }

        // queries .........................................................
                public function getLatestAppartmentSales($limit = 4)
            {
                $annonces = Annonce::where('type', 'Appartement')
                                    ->orderBy('created_at', 'desc')
                                    ->take($limit)
                                    ->get();

                    return response()->json($annonces);
            }

            public function getDistinctVilles()
            {
                $villes = Annonce::distinct('ville')->pluck('ville');
                return response()->json($villes);
                // return $villes;
            }

            public function applyDiscountToAppartements()
            {
                $annonces = Annonce::where('type', 'Appartement')->get();

                foreach ($annonces as $annonce) {
                    $newPrice = $annonce->prix * 0.95; // Apply a 5% discount
                    $annonce->update(['prix' => $newPrice]);
                }
                return response()->json($annonces);
                // return $annonces;
            }

            public function deleteExpiredAnnonces()
            {
                $twoYearsAgo = now()->subYears(2);
                $threeMonthsAgo = now()->subMonths(3);

                $annonces = Annonce::where('created_at', '<', $twoYearsAgo)
                                    ->where('updated_at', '<', $threeMonthsAgo)
                                    ->delete();

                // return $annonces;
                return response()->json($annonces);
            }

            public function countAnnoncesByVille($ville)
            {
                $count = Annonce::where('ville', $ville)->count();

                // return $count;
                return response()->json($count);
            }

            public function getMostExpensiveAnnonce()
            {
                $annonce = Annonce::orderBy('prix', 'desc')->first();

                // return $annonce;
                return response()->json($annonce);
            }

            public function getSmallestAppartmentSuperficie()
            {
                $superficie = Annonce::where('type', 'Appartement')->min('superficie');

                // return $superficie;
                return response()->json($superficie);
            }

            public function getAveragePriceByType()
            {
                $averagePrices = Annonce::select('type', \DB::raw('AVG(prix) as average_price'))
                                        ->groupBy('type')
                                        ->get();

                // return $averagePrices;
                return response()->json($averagePrices);
            }

            public function countAllAnnoncesByVille()
            {
                $counts = Annonce::select('ville', \DB::raw('COUNT(*) as count'))
                                    ->groupBy('ville')
                                    ->get();
            
                // return $counts;
                return response()->json($counts);
            }
            

            public function getCityWithMostAnnonces()
            {
                $city = Annonce::select('ville', DB::raw('COUNT(*) as count'))
                                ->groupBy('ville')
                                ->orderBy('count', 'desc')
                                ->first();

                // return $city;
                return response()->json($city);
            }

            public function getVillesWithAverageSuperficie($minSuperficie, $maxSuperficie)
            {
                $villes = Annonce::select('ville', \DB::raw('AVG(superficie) as average_superficie'))
                                ->groupBy('ville')
                                ->havingBetween('average_superficie', [$minSuperficie, $maxSuperficie])
                                ->get();

                // return $villes;
                return response()->json($villes);
            }
           

}
