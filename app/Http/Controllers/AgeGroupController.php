<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgeGroupRequest;
use App\Http\Requests\UpdateAgeGroupRequest;
use App\Models\AgeGroup;

class AgeGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreAgeGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgeGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgeGroup  $ageGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AgeGroup $ageGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgeGroup  $ageGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AgeGroup $ageGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgeGroupRequest  $request
     * @param  \App\Models\AgeGroup  $ageGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgeGroupRequest $request, AgeGroup $ageGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgeGroup  $ageGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgeGroup $ageGroup)
    {
        //
    }
}
