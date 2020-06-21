<?php

namespace App\Http\Controllers;

use App\TugasAkhir;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->isAdmin() ){
            $list_pengajuan_ta = TugasAkhir::all();
        }elseif (Auth::user()->isMahasiswa()) {
            $list_pengajuan_ta = TugasAkhir::whereIdUser(Auth::user()->id)->get();
        }else{
            $list_pengajuan_ta = TugasAkhir::whereIdPembimbing1(Auth::user()->id);
        }
        return view('ta.index', compact('list_pengajuan_ta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $list_pembimbing =  $list_pembimbing = User::all()->where('id_level_user', 3)->pluck('nama', 'id');
        return view('ta.create', compact('list_pembimbing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['id_user'] = $request->user()->id;
        TugasAkhir::create($input);
        return redirect()->route('ta.index')->with('message',"Tugas Akhir Berhasil Di Ajukan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(TugasAkhir $tugasAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugasAkhir = TugasAkhir::find($id);
        $list_pembimbing =  $list_pembimbing = User::all()->where('id_level_user', 3)->pluck('nama', 'id');
        return view('ta.edit', compact('list_pembimbing', 'tugasAkhir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tugasAkhir = TugasAkhir::find($id);
        $tugasAkhir->update($request->all());
        return redirect()->route('ta.index')->with('message',"Tugas Akhir Berhasil Di Perbarui!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TugasAkhir::find($id)->delete();
        return redirect()->route('ta.index')->with('message',"Tugas Akhir Berhasil Di Hapus!");
    }
}
