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
    <h1 class="text-center mb-4">Modifier l'annonce "{{ $annonce->titre }}"</h1>

<form method="POST" action="{{ route('annonces.update', $annonce) }}" class="mt-4">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="titre" class="form-label">Titre :</label>
    <input type="text" name="titre" id="titre" value="{{ $annonce->titre }}" class="form-control">
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description :</label>
    <textarea name="description" id="description" class="form-control">{{ $annonce->description }}</textarea>
  </div>

  <div class="mb-3">
    <label for="type" class="form-label">Type :</label>
    <select name="type" id="type" class="form-select">
      <option value="Appartement" {{ $annonce->type == 'Appartement' ? 'selected' : '' }}>Appartement</option>
      <option value="Maison" {{ $annonce->type == 'Maison' ? 'selected' : '' }}>Maison</option>
      <option value="Villa" {{ $annonce->type == 'Villa' ? 'selected' : '' }}>Villa</option>
      <option value="Magasin" {{ $annonce->type == 'Magasin' ? 'selected' : '' }}>Magasin</option>
      <option value="Terrain" {{ $annonce->type == 'Terrain' ? 'selected' : '' }}>Terrain</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="ville" class="form-label">Ville :</label>
    <input type="text" name="ville" id="ville" value="{{ $annonce->ville }}" class="form-control">
  </div>

  <div class="mb-3">
    <label for="superficie" class="form-label">Superficie :</label>
    <input type="number" name="superficie" id="superficie" value="{{ $annonce->superficie }}" class="form-control">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="neuf" id="neuf" value="1" {{ $annonce->neuf ? 'checked' : '' }} class="form-check-input">
    <label for="neuf" class="form-check-label">Neuf :</label>
  </div>

  <div class="mb-3">
    <label for="prix" class="form-label">Prix :</label>
    <input type="number" step="0.01" name="prix" id="prix" value="{{ $annonce->prix }}" class="form-control">
  </div>

  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('annonces.index') }}" class="btn btn-secondary">Retour</a>
  </div>
</div>
</form>
</body>
</html>
