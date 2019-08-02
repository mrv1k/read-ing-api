@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            <div class="flex justify-between items-center">
                <h1 class="font-display text-4xl font-bold">
                    Reading sessions for `{{ $book->name }}`
                </h1>

                <a href="{{ route('books.sessions.create', $book) }}" class="bg-blue-500 px-6 py-4 text-white font-semibold rounded">Add Session</a>
            </div>

                <table class="my-8 bg-white w-full">
                    <thead>
                        <tr>
                            <th class="text-left font-400 p-6">Date</th>
                            <th class="text-center font-400 p-6">Start</th>
                            <th class="text-center font-400 p-6">End</th>
                            <th class="text-center font-400 p-6">Pages Read</th>
                            <th class="text-center font-400 p-6">Percentage Read</th>
                        </tr>
                    </thead>
                    @foreach($sessions as $session)
                        <tr>
                            <th class="text-left font-400 px-6 py-3">{{ $session->read_date }}</th>
                            <td class="text-center font-400 px-6 py-3">{{ $session->start }}</td>
                            <td class="text-center font-400 px-6 py-3">{{ $session->end }}</td>
                            <td class="text-center font-400 px-6 py-3">{{ $session->pages_read }}</td>
                            <td class="text-center font-400 px-6 py-3 font-semibold {{ $session->percentage_class }}">{{ $session->percentage_read }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
