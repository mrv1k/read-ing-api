@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                   My Books
                </div>

                <table>
                    <thead>
                        <tr>
                            <th class="text-left font-40 p-6">Name</th>
                            <th class="text-center font-400 p-6"># of Pages</th>
                            <th class="text-center font-400 p-6">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($books as $book)
                        <tr>
                            <th class="text-left font-400 px-6 py-3">{{ $book->name }}</th>
                            <td class="text-center font-400 px-6 py-3">{{ $book->pages }}</td>
                            <td class="text-center font-400 px-6 py-3">{!! $book->status !!}</td>
                            <td>
                                <a href="{{ route('books.sessions.index', $book) }}" class="text-blue-500">
                                    View Sessions
                                </a>
                                - {{ $book->readingSessions()->count() }}
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
