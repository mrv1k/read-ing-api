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
    public function store(Request $request, $bookId)
    {
        $readingSession = ReadingSession::create([
            'start' => $request->start,
            'end' => $request->end,
            'book_id' => $bookId,
        ]);

        return new ReadingSessionResource($readingSession);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReadingSession  $readingSession
     * @return \Illuminate\Http\Response
     */
    public function show($bookId, $readingSession)
    {
        // TODO: typehinting reading session breaks
        $readingSession = ReadingSession::findOrFail($readingSession);

        return new ReadingSessionResource($readingSession);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReadingSession  $readingSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookId, $readingSessionId)
    {
        $readingSession = ReadingSession::findOrFail($readingSessionId);

        $readingSession->update($request->only(['start', 'end']));

        return new ReadingSessionResource($readingSession);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReadingSession  $readingSession
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookId, ReadingSession $readingSession)
    {
        $readingSession->delete();

        return response()->json(null, 204);
    }
}
