<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\categorie
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categorie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categorie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categorie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class categorie extends Model
{
    use HasFactory;
}
