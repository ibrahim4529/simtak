<?php

namespace App\Http\Controllers;

use App\SidangTugasAkhir;
use App\Yudisium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YudisiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $list_yudisium = Yudisium::all();
        }elseif (Auth::user()->isMahasiswa()){
           $list_yudisium = Yudisium::whereIdUser(Auth::user()->id)->get();
        }else{
            $list_yudisium = SeminarTugasAkhir::all();
        }
        return view('yudisium.index', compact('list_yudisium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yudisium.create');
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
        $input['id_user'] = Auth::user()->id;
        $input['status'] = 'pengajuan';
        Yudisium::create($input);
        return redirect()->route('yudisium.index')->with('message', 'Pengajuan Yudisium Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function show(Yudisium $yudisium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yudisium = Yudisium::find($id);
        return view('yudisium.edit', compact('yudisium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Yudisium::find($id)->update($request->all());
        return redirect()->route('yudisium.index')->with('message', 'Update Yudisium Selesai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yudisium $yudisium)
    {
        //
    }
}
