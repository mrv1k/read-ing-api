<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReadingSessionResource;
use App\Models\ReadingSession;
use Illuminate\Http\Request;

class ReadingSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReadingSessionResource::collection(ReadingSession::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReadingSession  $readingSession
     * @return \Illuminate\Http\Response
     */
    public function show(ReadingSession $readingSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReadingSession  $readingSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReadingSession $readingSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReadingSession  $readingSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReadingSession $readingSession)
    {
        //
    }
}
