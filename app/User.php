<?php

namespace App;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\This;

/**
 * App\User
 *
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @mixin Eloquent
 * @property int $id
 * @property string $nama
 * @property string $no_identitas
 * @property string $password
 * @property int $id_prodi
 * @property int $id_level_user
 * @property string $jenis_kelamin
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read KerjaPraktek $kerja_praktek
 * @property-read LevelUser $level_user
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIdLevelUser($value)
 * @method static Builder|User whereIdProdi($value)
 * @method static Builder|User whereJenisKelamin($value)
 * @method static Builder|User whereNama($value)
 * @method static Builder|User whereNoIdentitas($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @property-read Prodi $prodi
 * @property-read TugasAkhir $tugas_akhir
 * @property-read int|null $tugas_akhir_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Yudisium[] $yudisium
 * @property-read int|null $yudisium_count
 * @property-read int|null $kerja_praktek_count
 */
class User extends Authenticatable
{
    protected $table = 'tbl_user';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'no_identitas', 'id_prodi', 'jenis_kelamin', 'password', 'id_level_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function kerja_praktek()
    {
        return $this->hasMany(KerjaPraktek::class, 'id_user');
    }

    public function tugas_akhir()
    {
        return $this->hasMany(TugasAkhir::class, 'id_user');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function level_user()
    {
        return $this->belongsTo(LevelUser::class, 'id_level_user');
    }

    public function isAdmin()
    {
        return $this->level_user->slug == 'admin';
    }

    public function isMahasiswa()
    {
        return $this->level_user->slug == 'mahasiswa';
    }

    public function isDosen()
    {
        return $this->level_user->slug == 'dosen';
    }

    public function selesai_ta()
    {
        if ($this->tugas_akhir) {
            return $this->tugas_akhir()->where('status', 'setujui')->first() != null;
        }
        return false;
    }

    public function selesai_kp()
    {
        if ($this->kerja_praktek) {
            return $this->kerja_praktek()->where('status', 'setujui')->first() != null;
        }
        return false;
    }

    public function selesai_presentasi_kp()
    {
        if ($this->selesai_kp()) {
            $pkp = PresentasiKerjaPraktek::whereIdKp($this->kerja_praktek()->where('status', 'setujui')->first()->id)->where('status', 'setujui')->first();
            return $pkp != null;
        }
        return false;
    }

    public function selesai_seminar_ta()
    {
        if ($this->selesai_ta()) {
            $ta = SeminarTugasAkhir::whereIdTa($this->tugas_akhir()->where('status', 'setujui')->first()->id)->where('status', 'setujui')->first();
            return $ta != null;
        }
        return false;
    }

    public function selesai_sidang_ta()
    {
        if ($this->selesai_ta()) {
            $ta = SidangTugasAkhir::whereIdTa($this->tugas_akhir()->where('status', 'setujui')->first()->id)->where('status', 'setujui')->first();
            return $ta != null;
        }
        return false;
    }

    public function yudisium()
    {
        return $this->hasMany(Yudisium::class, 'id_user');
    }

    public function selesai_yudisium()
    {
        if ($this->yudisium()) {
            return $this->yudisium()->where('status', 'setujui')->first() != null;
        }
        return false;
    }
}
