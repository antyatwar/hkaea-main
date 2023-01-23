<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterUserRequest;
use App\Http\Requests\UpdateNewsletterUserRequest;
use App\Models\NewsletterUser;

class NewsletterUserController extends Controller
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
     * @param  \App\Http\Requests\StoreNewsletterUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function show(NewsletterUser $newsletterUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsletterUser $newsletterUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsletterUserRequest  $request
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsletterUserRequest $request, NewsletterUser $newsletterUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterUser  $newsletterUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsletterUser $newsletterUser)
    {
        //
    }
}
