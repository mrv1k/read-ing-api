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

        factory(ReadingSession::class)->create(['book_id' => $book->id, 'start' => 1]);
        factory(ReadingSession::class)->create(['book_id' => $book->id, 'start' => 26]);

        $response = $this->getJson('api/books/1/sessions');

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }

    public function testUserCanCreateAReadingSession()
    {
        $this->actingAs(factory(User::class)->create());

        $book = factory(Book::class)->create();

        $payload = ['start' => 1, 'end' => 11];

        $response = $this->postJson('api/books/' . $book->id . '/sessions', $payload);

        $response->assertStatus(201);

        $response->assertJsonFragment($payload);
    }

    public function testUserCanRetriveASingleReadingSession()
    {
        $this->actingAs(factory(User::class)->create());

        $this->withoutExceptionHandling();

        factory(ReadingSession::class)->create();

        $response = $this->getJson('api/books/1/sessions/1');

        $response->assertStatus(200);
    }

    public function testUserCanUpdateAReadingSession()
    {
        $this->actingAs(factory(User::class)->create());

        $this->withoutExceptionHandling();

        factory(ReadingSession::class)->create();

        $response = $this->patchJson('api/books/1/sessions/1', ['start' => 50, 'end' => 75]);

        $response
            ->assertStatus(200)
            ->assertJsonFragment(['start' => 50, 'end' => 75]);
    }

    public function testUserCanDeleteAReadingSession()
    {
        $this->actingAs(factory(User::class)->create());

        factory(ReadingSession::class)->create();

        $this->deleteJson('api/books/1/sessions/1')
            ->assertStatus(204);
    }
}
