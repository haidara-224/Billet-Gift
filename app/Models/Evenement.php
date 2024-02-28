<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Evenement
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $date_debut
 * @property string|null $date_fin
 * @property string|null $image
 * @property int $salle_id
 * @property int $organisateur_id
 * @property int $categorie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EvenementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereOrganisateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereSalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evenement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Evenement extends Model
{
    use HasFactory;
}
