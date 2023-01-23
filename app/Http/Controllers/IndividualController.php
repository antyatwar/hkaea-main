<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndividualRequest;
use App\Http\Requests\UpdateIndividualRequest;
use App\Models\Individual;

class IndividualController extends Controller
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
     * @param  \App\Http\Requests\StoreIndividualRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndividualRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Individual  $individual
     * @return \Illuminate\Http\Response
     */
    public function show(Individual $individual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Individual  $individual
     * @return \Illuminate\Http\Response
     */
    public function edit(Individual $individual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIndividualRequest  $request
     * @param  \App\Models\Individual  $individual
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndividualRequest $request, Individual $individual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Individual  $individual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Individual $individual)
    {
        //
    }
}
