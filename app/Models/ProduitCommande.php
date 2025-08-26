<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProduitCommande
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $article_id
 * @property int $commande_id
 * @property int $quantite
 * @property int $prix_unitaire
 * 
 * @property Article $article
 * @property Commande $commande
 *
 * @package App\Models
 */
class ProduitCommande extends Model
{
	protected $table = 'produit_commande';

	protected $casts = [
		'article_id' => 'int',
		'commande_id' => 'int',
		'quantite' => 'int',
		'prix_unitaire' => 'int'
	];

	protected $fillable = [
		'article_id',
		'commande_id',
		'quantite',
		'prix_unitaire'
	];

	public function article()
	{
		return $this->belongsTo(Article::class);
	}

	public function commande()
	{
		return $this->belongsTo(Commande::class);
	}
}
