<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ReadingSession;
use Illuminate\Http\Request;

class ReadingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        $sessions = $book->readingSessions;
        return view('sessions.index', compact('sessions', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        // return 'we are gonna create our session';
        return view('sessions.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        if ($request->end > $book->pages) {
            return redirect()->back()->withErrors(['end' => 'You cant go over the book limit']);
        }
        $attributes = $request->validate([
            'start' => 'required|integer|lt:end',
            'end' => 'required|integer|gt:start',
        ]);

        $session = $book->readingSessions()->create($attributes);
        return redirect()->route('books.sessions.index', $book);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReadingSession  $readingSession
     * @return \Illuminate\Http\Response
     */
    public function edit(ReadingSession $readingSession)
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
