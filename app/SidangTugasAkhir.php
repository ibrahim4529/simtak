<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\SidangTugasAkhir
 *
 * @property int $id
 * @property int $id_ta
 * @property string|null $dok_form_pengajuan_sidang_ta
 * @property string|null $dok_transkrip_nilai
 * @property string|null $dok_ket_lulus_praktikum
 * @property string|null $dok_pem_sidang_ta
 * @property string|null $dok_ket_bebas_ukt
 * @property string|null $dok_akta_lahir
 * @property string|null $dok_ijazah_sma
 * @property string $status
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read TugasAkhir $tugas_akhir
 * @method static Builder|SidangTugasAkhir newModelQuery()
 * @method static Builder|SidangTugasAkhir newQuery()
 * @method static Builder|SidangTugasAkhir query()
 * @method static Builder|SidangTugasAkhir whereCreatedAt($value)
 * @method static Builder|SidangTugasAkhir whereDokAktaLahir($value)
 * @method static Builder|SidangTugasAkhir whereDokFormPengajuanSidangTa($value)
 * @method static Builder|SidangTugasAkhir whereDokIjazahSma($value)
 * @method static Builder|SidangTugasAkhir whereDokKetBebasUkt($value)
 * @method static Builder|SidangTugasAkhir whereDokKetLulusPraktikum($value)
 * @method static Builder|SidangTugasAkhir whereDokPemSidangTa($value)
 * @method static Builder|SidangTugasAkhir whereDokTranskripNilai($value)
 * @method static Builder|SidangTugasAkhir whereId($value)
 * @method static Builder|SidangTugasAkhir whereIdTa($value)
 * @method static Builder|SidangTugasAkhir whereKeterangan($value)
 * @method static Builder|SidangTugasAkhir whereStatus($value)
 * @method static Builder|SidangTugasAkhir whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SidangTugasAkhir extends Model
{
    protected $table = 'tbl_sidang_ta';
    protected $fillable = [
        'id_ta', 'dok_form_pengajuan_sidang_ta', 'dok_transkrip_nilai',
        'dok_ket_lulus_praktikum','dok_pem_sidang_ta','dok_ket_bebas_ukt',
        'dok_akta_lahir', 'dok_ijazah_sma', 'status', 'keterangan'
    ];
    public function tugas_akhir(){
        return $this->belongsTo(TugasAkhir::class, 'id_ta');
    }
}
