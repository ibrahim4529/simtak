<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\SeminarTugasAkhir
 *
 * @property int $id
 * @property int $id_ta
 * @property string|null $dok_form_pengajuan_ta
 * @property string|null $dok_pem_seminar_ta
 * @property string|null $dok_laporan_ta
 * @property string|null $dok_krs
 * @property string $status
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read TugasAkhir $tugas_akhir
 * @method static Builder|SeminarTugasAkhir newModelQuery()
 * @method static Builder|SeminarTugasAkhir newQuery()
 * @method static Builder|SeminarTugasAkhir query()
 * @method static Builder|SeminarTugasAkhir whereCreatedAt($value)
 * @method static Builder|SeminarTugasAkhir whereDokFormPengajuanTa($value)
 * @method static Builder|SeminarTugasAkhir whereDokKrs($value)
 * @method static Builder|SeminarTugasAkhir whereDokLaporanTa($value)
 * @method static Builder|SeminarTugasAkhir whereDokPemSeminarTa($value)
 * @method static Builder|SeminarTugasAkhir whereId($value)
 * @method static Builder|SeminarTugasAkhir whereIdTa($value)
 * @method static Builder|SeminarTugasAkhir whereKeterangan($value)
 * @method static Builder|SeminarTugasAkhir whereStatus($value)
 * @method static Builder|SeminarTugasAkhir whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SeminarTugasAkhir extends Model
{
    protected $table = 'tbl_seminar_ta';
    protected $fillable = [
        'id_ta', 'dok_form_pengajuan_ta', 'dok_pem_seminar_ta',
        'dok_laporan_ta', 'dok_krs', 'status', 'keterangan'
    ];

    public function tugas_akhir(){
        return $this->belongsTo(TugasAkhir::class, 'id_ta');
    }
}
