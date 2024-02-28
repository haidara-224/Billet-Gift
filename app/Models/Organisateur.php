<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Organisateur
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $adresse
 * @property string $email
 * @property string $tel
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OrganisateurFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisateur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Organisateur extends Model
{
    use HasFactory;
    protected $fillable=['name','description','email','adresse','tel','image'];
}
