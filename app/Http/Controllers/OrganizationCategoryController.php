<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationCategoryRequest;
use App\Http\Requests\UpdateOrganizationCategoryRequest;
use App\Models\OrganizationCategory;

class OrganizationCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreOrganizationCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationCategory $organizationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationCategory $organizationCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizationCategoryRequest  $request
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizationCategoryRequest $request, OrganizationCategory $organizationCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationCategory $organizationCategory)
    {
        //
    }
}
