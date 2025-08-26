<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produit_commande', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('article_id')->constrained();
            $table->foreignId('commande_id')->constrained();

            $table->integer("quantite");
            $table->integer("prix_unitaire");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_commande');
    }
};
