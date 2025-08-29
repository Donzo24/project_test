@extends("layouts.master")

@section("content")

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
@endsection