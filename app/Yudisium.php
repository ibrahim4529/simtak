<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Yudisium
 *
 * @property int $id
 * @property int $id_user
 * @property string|null $dok_form_pengajuan_yudisium
 * @property string|null $dok_cv
 * @property string|null $dok_ket_bebas_keuangan
 * @property string|null $dok_ket_bebas_pustaka_prodi
 * @property string|null $dok_ket_bebas_pustaka
 * @property string|null $dok_ket_bebas_lab
 * @property string|null $dok_ket_bebas_revisi
 * @property string $status
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|Yudisium newModelQuery()
 * @method static Builder|Yudisium newQuery()
 * @method static Builder|Yudisium query()
 * @method static Builder|Yudisium whereCreatedAt($value)
 * @method static Builder|Yudisium whereDokCv($value)
 * @method static Builder|Yudisium whereDokFormPengajuanYudisium($value)
 * @method static Builder|Yudisium whereDokKetBebasKeuangan($value)
 * @method static Builder|Yudisium whereDokKetBebasLab($value)
 * @method static Builder|Yudisium whereDokKetBebasPustaka($value)
 * @method static Builder|Yudisium whereDokKetBebasPustakaProdi($value)
 * @method static Builder|Yudisium whereDokKetBebasRevisi($value)
 * @method static Builder|Yudisium whereId($value)
 * @method static Builder|Yudisium whereIdUser($value)
 * @method static Builder|Yudisium whereKeterangan($value)
 * @method static Builder|Yudisium whereStatus($value)
 * @method static Builder|Yudisium whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string $judul_laporan
 * @method static Builder|Yudisium whereJudulLaporan($value)
 */
class Yudisium extends Model
{
    protected $table = 'tbl_yudisium';
    protected $fillable = [
        'dok_form_pengajuan_yudisium', 'id_user', 'dok_cv', 'dok_ket_bebas_keuangan',
        'dok_ket_bebas_pustaka_prodi', 'dok_ket_bebas_pustaka', 'dok_ket_bebas_lab',
        'dok_ket_bebas_revisi', 'status', 'keterangan'
        ,'judul_laporan'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
