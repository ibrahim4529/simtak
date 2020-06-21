<?php

namespace App\Http\Controllers;

use App\KerjaPraktek;
use App\LevelUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KerjaPraktekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $list_pengajuan_kp = KerjaPraktek::all();
        } elseif (Auth::user()->isMahasiswa()) {
            $list_pengajuan_kp = KerjaPraktek::whereIdUser(Auth::user()->id)->get();
        } else {
            $list_pengajuan_kp = KerjaPraktek::whereIdPembimbing(Auth::user()->id)->get();
        }
        return view('kp.index', compact('list_pengajuan_kp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $list_pembimbing = User::all()->where('id_level_user', 3)->pluck('nama', 'id');
        return view('kp.create', compact('list_pembimbing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['status'] = 'pengajuan';
        $input['id_user'] = Auth::user()->id;
        KerjaPraktek::create($input);
        return redirect()->route('kp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\LevelUser $levelUser
     * @return \Illuminate\Http\Response
     */
    public function show(LevelUser $levelUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\LevelUser $levelUser
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = KerjaPraktek::find($id);
        $list_pembimbing = User::all()->where('id_level_user', 3)->pluck('nama', 'id');
        return view('kp.edit', compact('data', 'list_pembimbing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\LevelUser $levelUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = KerjaPraktek::find($id);
        $data->update($request->all());
        return redirect()->route('kp.index')->with('message','Kp Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\LevelUser $levelUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data= KerjaPraktek::find($id);
        $data->delete();
        return redirect()->route('kp.index')->with('message','Kp Berhasil di hapus !');
    }
}
