<?php

namespace App\Http\Controllers;

use App\KerjaPraktek;
use App\PresentasiKerjaPraktek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresentasiKPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->isAdmin() ){
            $list_presentasi_kp = PresentasiKerjaPraktek::all();
        }elseif (Auth::user()->isMahasiswa()) {
            $kp = KerjaPraktek::whereIdUser(Auth::user())->first();
            if($kp){
                $list_presentasi_kp = PresentasiKerjaPraktek::whereIdKp($kp->id)->get();
            }
            $list_presentasi_kp = [];
        }
        return view('presentasi-kp.index', compact('list_presentasi_kp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PresentasiKerjaPraktek  $presentasiKerjaPraktek
     * @return \Illuminate\Http\Response
     */
    public function show(PresentasiKerjaPraktek $presentasiKerjaPraktek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PresentasiKerjaPraktek  $presentasiKerjaPraktek
     * @return \Illuminate\Http\Response
     */
    public function edit(PresentasiKerjaPraktek $presentasiKerjaPraktek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PresentasiKerjaPraktek  $presentasiKerjaPraktek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PresentasiKerjaPraktek $presentasiKerjaPraktek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PresentasiKerjaPraktek  $presentasiKerjaPraktek
     * @return \Illuminate\Http\Response
     */
    public function destroy(PresentasiKerjaPraktek $presentasiKerjaPraktek)
    {
        //
    }
}
