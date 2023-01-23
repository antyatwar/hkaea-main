<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParticipantCategoryRequest;
use App\Http\Requests\UpdateParticipantCategoryRequest;
use App\Models\ParticipantCategory;

class ParticipantCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreParticipantCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticipantCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParticipantCategory  $participantCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ParticipantCategory $participantCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParticipantCategory  $participantCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ParticipantCategory $participantCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParticipantCategoryRequest  $request
     * @param  \App\Models\ParticipantCategory  $participantCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParticipantCategoryRequest $request, ParticipantCategory $participantCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParticipantCategory  $participantCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParticipantCategory $participantCategory)
    {
        //
    }
}
