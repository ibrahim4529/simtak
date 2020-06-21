<?php

namespace App\Http\Controllers;

use App\KerjaPraktek;
use App\LevelUser;
use App\PresentasiKerjaPraktek;
use App\Prodi;
use App\SeminarTugasAkhir;
use App\SidangTugasAkhir;
use App\TugasAkhir;
use App\User;
use App\Yudisium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $jumlah = [
                'dosen' => User::whereIdLevelUser(LevelUser::whereSlug('dosen')->first()->id)->count(),
                'mahasiswa' => $jml_mahasiswa = User::whereIdLevelUser(LevelUser::whereSlug('mahasiswa')->first()->id)->count(),
                'admin' => User::whereIdLevelUser(LevelUser::whereSlug('admin')->first()->id)->count(),
                'prodi' => Prodi::count(),
            ];
            $selesai = [
                'pengajuan ta' => TugasAkhir::whereStatus('setujui')->count(),
                'seminar ta' => SeminarTugasAkhir::whereStatus('setujui')->count(),
                'sidang ta' => SidangTugasAkhir::whereStatus('setujui')->count(),
                'yudisium' => Yudisium::whereStatus('setujui')->count(),
            ];
            return view('home', compact('jumlah','selesai'));
        } elseif (Auth::user()->isMahasiswa()) {
            $tahap = [
                'pengajuan ta' => Auth::user()->selesai_ta(),
                'seminar ta' => Auth::user()->selesai_seminar_ta(),
                'sidang ta' => Auth::user()->selesai_sidang_ta(),
                'yudisium' => Auth::user()->selesai_yudisium(),
            ];
            $jumlah_tahap = 0;
            foreach ($tahap as $ta){
                if($ta){
                    $jumlah_tahap++;
                }
            }
            return view('home', compact('tahap', 'jumlah_tahap'));
        }
        return view('home');
    }
}
