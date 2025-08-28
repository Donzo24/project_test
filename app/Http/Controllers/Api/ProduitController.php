<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => "required|max:100",
            'prix_vente' => "required|numeric",
            'description' => "nullable|string"
        ]);

        $request->merge(['slug' => Str::slug($request->nom)]);

        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Article::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        if($article) {
            $article->delete();
            return response()->json(['message' => 'Produit supprimé avec succès']);
        } else {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }
    }
}
