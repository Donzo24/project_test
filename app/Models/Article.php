<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $nom
 * @property int $prix_vente
 * @property string $slug
 * @property string|null $description
 *
 * @property Collection|ProduitCommande[] $produit_commandes
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'produits';

	protected $casts = [
		'prix_vente' => 'int'
	];

	protected $fillable = [
		'nom',
		'prix_vente',
		'slug',
		'description'
	];

	public function produit_commandes()
	{
		return $this->hasMany(ProduitCommande::class);
	}
}
