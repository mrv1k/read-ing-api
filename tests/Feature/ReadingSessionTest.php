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

    public function testCanRetrieveAllReadingSectionsForABook()
    {
        $book = factory(Book::class)->create();

        $this->postJson('api/books/1/sessions', ['start' => 1, 'end' => 26]);
        $this->postJson('api/books/1/sessions', ['start' => 26, 'end' => 51]);

        $response = $this->getJson('api/books/1/sessions');

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }

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

        $this->deleteJson('api/books/1/sessions/1')
            ->assertStatus(204);
    }
}
