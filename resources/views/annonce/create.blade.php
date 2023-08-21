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
    <h1  class="text-center mb-4">Ajouter une annonce</h1>
    <form method="POST" action="{{ route('annonces.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" name="titre" id="titre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type :</label>
            <select name="type" id="type" class="form-select">
                <option value="Appartement">Appartement</option>
                <option value="Maison">Maison</option>
                <option value="Villa">Villa</option>
                <option value="Magasin">Magasin</option>
                <option value="Terrain">Terrain</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" name="ville" id="ville" class="form-control">
        </div>
        <div class="mb-3">
            <label for="superficie" class="form-label">Superficie :</label>
            <input type="number" name="superficie" id="superficie" class="form-control">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="neuf" id="neuf" value="1" {{ $annonce->neuf ? 'checked' : '' }}>
            <label for="neuf" class="form-check-label">Neuf</label>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix :</label>
            <input type="number" step="0.01" name="prix" id="prix" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('annonces.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>

</body>
</html>
