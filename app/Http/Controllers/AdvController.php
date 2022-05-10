<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Http\Requests\StoreAdvRequest;
use App\Http\Requests\UpdateAdvRequest;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAdvRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function show(Adv $adv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function edit(Adv $adv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvRequest  $request
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvRequest $request, Adv $adv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adv  $adv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adv $adv)
    {
        //
    }
}
