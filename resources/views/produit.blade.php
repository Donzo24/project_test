<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des produits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="{{ route("logout") }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Deconnexion</button>
        </form>
        <h3 class="alert-info alert mt-5">Gestion des produits</h3>
        <form action="{{ route("produits.store") }}" method="post">
            @csrf
            <div class="form-froup">
                <label for="">Nom du produit</label>
                <input type="text" name="nom" id="" class="form-control @error('nom') is-invalid @enderror">
            </div>
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="">Prix</label>
                <input type="number" name="prix" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            @can('create product')
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            @endcan


        </form>

        <div class="table mt-4">
            <table class="table table-bordered">
                <thead>
                    <td>id</td>
                    <td>Nom</td>
                    <td>Prix</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->id }}</td>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->prix_vente }}</td>
                            <td>
                                @can('edit product')
                                    <a href="{{ route("produits.edit", $produit->id) }}" class="btn btn-primary">Modifier</a>
                                @endcan
                                @can('delete product')
                                    <a href="#" data-href="{{ route("produits.destroy", $produit->id) }}" class="btn btn-danger btn-delete">Supprimer</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
       $(".btn-delete").click(function(e) {
            e.preventDefault();
            var url = $(this).attr("data-href");
            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },

            });
       });
    });
</script>
</html>
