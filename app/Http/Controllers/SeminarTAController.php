<?php

namespace App\Http\Controllers;

use App\SeminarTugasAkhir;
use App\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeminarTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $list_seminar_ta = SeminarTugasAkhir::all();
        }elseif (Auth::user()->isMahasiswa()){
            $ta = TugasAkhir::whereIdUser(Auth::user()->id)->where('status', 'setujui')->first();
            if($ta){
                $list_seminar_ta = SeminarTugasAkhir::whereIdTa($ta->id)->get();
            }else{
                $list_seminar_ta = [];
            }
        }else{
            $list_seminar_ta = SeminarTugasAkhir::all();
        }

        return view('seminar-ta.index', compact('list_seminar_ta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_ta = TugasAkhir::whereIdUser(Auth::user()->id)->where('status', 'setujui')->pluck('judul_ta', 'id');
        return  view('seminar-ta.create', compact('list_ta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['status'] = 'pengajuan';
        SeminarTugasAkhir::create($input);
        return  redirect()->route('seminar-ta.index')->with('message', 'Pengajuan Tugas Akhir selesai tunggu sampai di response');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeminarTugasAkhir  $seminarTugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarTugasAkhir $seminarTugasAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeminarTugasAkhir  $seminarTugasAkhir
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $seminarTa = SeminarTugasAkhir::find($id);
        $list_ta = TugasAkhir::whereIdUser($seminarTa->tugas_akhir->id_user)->where('status', 'setujui')->pluck('judul_ta', 'id');
        return  view('seminar-ta.edit', compact('list_ta', 'seminarTa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeminarTugasAkhir  $seminarTugasAkhir
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = SeminarTugasAkhir::find($id);
        $data->update($request->all());
        return  redirect()->route('seminar-ta.index')->with('message', 'Seminar Tugas Akhir Berhasil Di perbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeminarTugasAkhir  $seminarTugasAkhir
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        SeminarTugasAkhir::find($id)->delete();
        return  redirect()->route('seminar-ta.index')->with('message', 'Seminar Tugas Akhir Berhasil Di Hapus');
    }
}
