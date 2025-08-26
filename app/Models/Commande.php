<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commande
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $numero_commande
 * @property Carbon $date_commande
 * 
 * @property Collection|ProduitCommande[] $produit_commandes
 *
 * @package App\Models
 */
class Commande extends Model
{
	protected $table = 'commandes';

	protected $casts = [
		'date_commande' => 'datetime'
	];

	protected $fillable = [
		'numero_commande',
		'date_commande'
	];

	public function produit_commandes()
	{
		return $this->hasMany(ProduitCommande::class);
	}
}
