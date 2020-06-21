<?php

namespace App\Http\Controllers;

use App\SidangTugasAkhir;
use App\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SidangTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->isAdmin()){
            $list_sidang_ta = SidangTugasAkhir::all();
        }elseif (Auth::user()->isMahasiswa()){
            $list_sidang_ta = SidangTugasAkhir::whereIdTa(Auth::user()->tugas_akhir()->where('status', 'setujui')->first()->id)->get();
        }
        return view('sidang-ta.index', compact('list_sidang_ta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $list_ta = TugasAkhir::whereIdUser(Auth::user()->id)->where('status', 'setujui')->pluck('judul_ta', 'id');
        return  view('sidang-ta.create', compact('list_ta'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['status'] = 'pengajuan';
        SidangTugasAkhir::create($input);
        return  redirect()->route('sidang-ta.index')->with('message', 'Pengajuan Sidang Tugas Akhir selesai tunggu sampai di response');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SidangTugasAkhir  $sidangTugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(SidangTugasAkhir $sidangTugasAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SidangTugasAkhir  $sidangTugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sidangTa = SidangTugasAkhir::find($id);
        $list_ta = TugasAkhir::whereIdUser($sidangTa->tugas_akhir->id_user)->where('status', 'setujui')->pluck('judul_ta', 'id');
        return  view('sidang-ta.edit', compact('list_ta', 'sidangTa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SidangTugasAkhir  $sidangTugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SidangTugasAkhir::find($id)->update($request->all());
        return  redirect()->route('sidang-ta.index')->with('message', 'Pembaruan Sidang Tugas Akhir selesai tunggu sampai di response');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SidangTugasAkhir  $sidangTugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        SidangTugasAkhir::find($id)->delete();
        return  redirect()->route('sidang-ta.index')->with('message', 'Pneghapusan Sidang Tugas Akhir selesai !');
    }
}
