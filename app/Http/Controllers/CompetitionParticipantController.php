<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionParticipantRequest;
use App\Http\Requests\UpdateCompetitionParticipantRequest;
use App\Models\CompetitionParticipant;

class CompetitionParticipantController extends Controller
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
     * @param  \App\Http\Requests\StoreCompetitionParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompetitionParticipantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(CompetitionParticipant $competitionParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(CompetitionParticipant $competitionParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompetitionParticipantRequest  $request
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompetitionParticipantRequest $request, CompetitionParticipant $competitionParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompetitionParticipant  $competitionParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompetitionParticipant $competitionParticipant)
    {
        //
    }
}
