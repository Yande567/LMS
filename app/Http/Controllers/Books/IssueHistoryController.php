<?php

namespace App\Http\Controllers\Books;

use App\Models\IssueHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIssueHistoryRequest;
use App\Http\Requests\UpdateIssueHistoryRequest;

class IssueHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreIssueHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function show(IssueHistory $issueHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(IssueHistory $issueHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIssueHistoryRequest  $request
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIssueHistoryRequest $request, IssueHistory $issueHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssueHistory $issueHistory)
    {
        //
    }
}
