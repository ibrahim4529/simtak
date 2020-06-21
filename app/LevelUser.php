<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\LevelUser
 *
 * @property int $id
 * @property string $slug
 * @property string $nama
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|LevelUser newModelQuery()
 * @method static Builder|LevelUser newQuery()
 * @method static Builder|LevelUser query()
 * @method static Builder|LevelUser whereCreatedAt($value)
 * @method static Builder|LevelUser whereId($value)
 * @method static Builder|LevelUser whereNama($value)
 * @method static Builder|LevelUser whereSlug($value)
 * @method static Builder|LevelUser whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 */
class LevelUser extends Model
{
    protected $table = 'tbl_level_user';
    protected $fillable = [
        'slug', 'nama'
    ];

    public function users() {
        return $this->hasMany(User::class, 'id_level_user');
    }
}
