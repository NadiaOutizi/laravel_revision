<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{ $annonce->titre }}</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Type : {{ $annonce->type }}</h5>
            <p class="card-text">Description : {{ $annonce->description }}</p>
            <ul class="list-group">
                <li class="list-group-item"><strong>Ville :</strong> {{ $annonce->ville }}</li>
                <li class="list-group-item"><strong>Superficie :</strong> {{ $annonce->superficie }}</li>
                <li class="list-group-item"><strong>Prix :</strong> {{ $annonce->prix }} $</li>
                <li class="list-group-item"><strong>Etat :</strong> {{ $annonce->neuf ? 'Neuf' : 'Ancien' }}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('annonces.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>