
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Liste des annonces</h1>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Ville</th>
                <th>Superficie</th>
                <th>Neuf</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($annonces as $annonce)
                <tr>
                    <td>{{ $annonce->titre }}</td>
                    <td>{{ $annonce->type }}</td>
                    <td>{{ $annonce->ville }}</td>
                    <td>{{ $annonce->superficie }}</td>
                    <td>{{ $annonce->neuf ? 'Oui' : 'Non' }}</td>
                    <td>{{ $annonce->prix }}</td>
                    <td>
                        <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-warning">Modifier</a>
                        <form method="POST" action="{{ route('annonces.destroy', $annonce->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('annonces.create') }}" class="btn btn-success">Ajouter une annonce</a>
    </div>
</body>
</html>
   