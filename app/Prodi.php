<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Prodi
 *
 * @property int $id
 * @property string $kd_prodi
 * @property string $nama_prodi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Prodi newModelQuery()
 * @method static Builder|Prodi newQuery()
 * @method static Builder|Prodi query()
 * @method static Builder|Prodi whereCreatedAt($value)
 * @method static Builder|Prodi whereId($value)
 * @method static Builder|Prodi whereKdProdi($value)
 * @method static Builder|Prodi whereNamaProdi($value)
 * @method static Builder|Prodi whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Prodi extends Model
{
    protected $table = 'tbl_prodi';
    protected $fillable = [
        'kd_prodi',
        'nama_prodi',
    ];
}
