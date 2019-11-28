<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\ReadingSession;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadingSessionTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanCreateAReadingSession()
    {
        $john = factory(User::class)->create();
        $this->actingAs($john);
        $book = factory(Book::class)->create();

        $payload = ['start' => 1, 'end' => 11];

        $response = $this->postJson('api/books/' . $book->id . '/sessions', $payload);

        $response->assertStatus(201);

        $response->assertJsonFragment($payload);
    }

    public function testUserCanDeleteAReadingSession()
    {
        $john = factory(User::class)->create();
        $this->actingAs($john);
        $readingSession = factory(ReadingSession::class)->create();
    }
}
