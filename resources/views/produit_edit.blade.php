<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mise a jour d'un produit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4 class="mt-3 alert alert-primary">Mise a jour d'un produit: {{ $produit->nom }}</h4>
        <form action="{{ route("produits.update", $produit->id) }}" method="POST" >
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" name="nom" id="" class="form-control @error('nom') is-invalid @enderror" value="{{ $produit->nom }}">
            </div>

            <div class="form-group">
                <label for="">Prix</label>
                <input type="text" name="prix" id="" class="form-control" value="{{ $produit->prix_vente }}">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $produit->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>

        </form>
    </div>
</body>
</html>