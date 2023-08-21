<?php

namespace Database\Seeders;

use App\Models\Annonce;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Annonce::create([
            'titre' => 'Appartement 1',
            'description' => 'Bel appartement lumineux',
            'type' => 'Appartement',
            'ville' => 'Paris',
            'superficie' => 50.50,
            'neuf' => true,
            'prix' => 100000.00,
        ]);
    
        Annonce::create([
            'titre' => 'Maison 1',
            'description' => 'Belle maison avec jardin',
            'type' => 'Maison',
            'ville' => 'Lyon',
            'superficie' => 150.75,
            'neuf' => false,
            'prix' => 250000.00,
        ]);
    
        Annonce::create([
            'titre' => 'Terrain 1',
            'description' => 'Grand terrain constructible',
            'type' => 'Terrain',
            'ville' => 'Marseille',
            'superficie' => 1000.00,
            'neuf' => true,
            'prix' => 500000.00,
        ]);
    }
    
}
