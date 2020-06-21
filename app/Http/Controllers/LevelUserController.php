<?php

namespace App\Http\Controllers;

use App\LevelUser;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LevelUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $list_level_user = LevelUser::all();
        return view('level_user.index', compact('list_level_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param LevelUser $levelUser
     * @return Response
     */
    public function show(LevelUser $levelUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LevelUser $levelUser
     * @return Response
     */
    public function edit(LevelUser $levelUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LevelUser $levelUser
     * @return Response
     */
    public function update(Request $request, LevelUser $levelUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LevelUser $levelUser
     * @return Response
     */
    public function destroy(LevelUser $levelUser)
    {
        //
    }
}
