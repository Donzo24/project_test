<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commentaire
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon $date_commentaire
 * @property int $produit_id
 *
 * @package App\Models
 */
class Commentaire extends Model
{
	protected $table = 'commentaire';

	protected $casts = [
		'date_commentaire' => 'datetime',
		'produit_id' => 'int'
	];

	protected $fillable = [
		'date_commentaire',
		'produit_id'
	];
}
