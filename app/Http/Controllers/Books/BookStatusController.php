<?php

namespace App\Http\Controllers\Books;

use App\Models\BookStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookStatusRequest;
use App\Http\Requests\UpdateBookStatusRequest;

class BookStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreBookStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function show(BookStatus $bookStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(BookStatus $bookStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookStatusRequest  $request
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookStatusRequest $request, BookStatus $bookStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookStatus $bookStatus)
    {
        //
    }
}
