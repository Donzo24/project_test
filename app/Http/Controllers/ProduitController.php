<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitCreateRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
