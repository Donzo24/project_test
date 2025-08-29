<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitCreateRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\Controller;

class ProduitController extends Controller
{
    function __construct()
    {
        // $this->middleware(["role:Admin", 'permission:edit product'])->only(['update', 'edit']);
        // $this->middleware(["role:Admin", 'permission:create product'])->only(['create', 'store']);
        // $this->middleware(["role:Admin", 'permission:view product'])->only(['index']);
        // $this->middleware(["role:Admin", 'permission:delete product']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("produit", [
            'produits' => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitCreateRequest $request)
    {
        Article::create([
            'nom' => $request->nom,
            'prix_vente' => $request->prix,
            'description' => $request->description,
            'slug' => Str::slug($request->nom),
        ]);

        return back()->with("success", "Produit ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("produit_edit", [
            'produit' => Article::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => "required|string|max:255",
        ]);

        // Update the product
        $produit = Article::find($id);
        $produit->update([
            'nom' => $request->nom,
            'prix_vente' => $request->prix,
            'description' => $request->description,
            'slug' => Str::slug($request->nom),
        ]);

        return redirect()->route("produits.index")->with("success", "Produit modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Article::find($id);
        $produit->delete();
    }
}
