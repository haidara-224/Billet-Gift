<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\salle
 *
 * @property int $id
 * @property string $name
 * @property string $adresse
 * @property int $capacity
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|salle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|salle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|salle query()
 * @method static \Illuminate\Database\Eloquent\Builder|salle whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salle whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salle whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class salle extends Model
{
    use HasFactory;
}
