<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\TugasAkhir
 *
 * @property int $id
 * @property int $id_user
 * @property string $bidang_ta
 * @property string $judul_ta
 * @property string $status
 * @property int $id_pembimbing_1
 * @property int $id_pembimbing_2
 * @property string|null $dok_pem_bim_ta
 * @property string|null $dok_pem_buku_pedoman
 * @property string|null $dok_krs
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $pembimbing_1
 * @property-read User $pembimbing_2
 * @property-read User $user
 * @method static Builder|TugasAkhir newModelQuery()
 * @method static Builder|TugasAkhir newQuery()
 * @method static Builder|TugasAkhir query()
 * @method static Builder|TugasAkhir whereBidangTa($value)
 * @method static Builder|TugasAkhir whereCreatedAt($value)
 * @method static Builder|TugasAkhir whereDokKrs($value)
 * @method static Builder|TugasAkhir whereDokPemBimTa($value)
 * @method static Builder|TugasAkhir whereDokPemBukuPedoman($value)
 * @method static Builder|TugasAkhir whereId($value)
 * @method static Builder|TugasAkhir whereIdPembimbing1($value)
 * @method static Builder|TugasAkhir whereIdPembimbing2($value)
 * @method static Builder|TugasAkhir whereIdUser($value)
 * @method static Builder|TugasAkhir whereJudulTa($value)
 * @method static Builder|TugasAkhir whereKeterangan($value)
 * @method static Builder|TugasAkhir whereStatus($value)
 * @method static Builder|TugasAkhir whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read SeminarTugasAkhir $seminar_ta
 * @property-read int|null $seminar_ta_count
 * @property-read Collection|SidangTugasAkhir[] $sidang_ta
 * @property-read int|null $sidang_ta_count
 */
class TugasAkhir extends Model
{
    protected $table = 'tbl_tugas_akhir';
    protected $fillable = [
        'id_user', 'bidang_ta', 'judul_ta', 'status', 'id_pembimbing_1',
        'id_pembimbing_2', 'dok_pem_bim_ta', 'dok_pem_buku_pedoman',
        'dok_krs', 'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pembimbing_1()
    {
        return $this->belongsTo(User::class, 'id_pembimbing_1');
    }

    public function pembimbing_2()
    {
        return $this->belongsTo(User::class, 'id_pembimbing_2');
    }

    public function seminar_ta()
    {
        return $this->hasMany(SeminarTugasAkhir::class, 'id_ta');
    }

    public function sidang_ta()
    {
        return $this->hasMany(SidangTugasAkhir::class, 'id_ta');
    }
}
