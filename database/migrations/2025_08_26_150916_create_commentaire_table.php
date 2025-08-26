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
        Schema::create('commentaire', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("date_commentaire");
            $table->unsignedInteger("produit_id");
            $table->foreign("produit_id")->references("id")->on("produits");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaire', function (Blueprint $table) {
            $table->dropForeign(['produit_id']);
        });
        Schema::dropIfExists('commentaire');
    }
};
