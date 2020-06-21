<?php

namespace App\Http\Controllers;

use App\LevelUser;
use App\Prodi;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $title = 'Admin';
        $list_user = User::whereIdLevelUser(1)->get(); // get user degan level admin
        return view('users.index', compact('list_user', 'title'));
    }

    public function index_dosen(){
        $title = 'Dosen';
        $list_user = User::whereIdLevelUser(3)->get(); // get user degan level dosen
        return view('users.index', compact('list_user', 'title'));
    }
    public function index_mahasiswa(){
        $title = 'Mahasiswa';
        $list_user = User::whereIdLevelUser(2)->get(); // get user degan level dosen
        return view('users.index', compact('list_user', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_prodi = Prodi::all()->pluck('nama_prodi', 'id');
        $list_level = LevelUser::all()->pluck('nama', 'id');
        return view('users.create', compact('list_prodi', 'list_level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return  redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $user = User::find($id);
        $list_prodi = Prodi::all()->pluck('nama_prodi', 'id');
        $list_level = LevelUser::all()->pluck('nama', 'id');
        return view('users.edit', compact('user', 'list_level', 'list_prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::find($id)->update($request->except('password', 'password_confirmation'));
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
