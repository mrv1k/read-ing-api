<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function testShouldReturnBooksWithReadingSessions()
    { }

    public function testShouldCreateABook()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $payload = ['title' => 'DTW', 'pages' => 100, 'user_id' => auth()->user()->id];

        $response = $this->postJson('api/books', $payload);

        $response->assertStatus(201);

        $response->assertJson([
            'data' => $payload
        ]);
    }

    public function testShouldFetchABook()
    {
        $book = factory(Book::class)->create();

        $response = $this->getJson('api/books/1');

        $response->assertStatus(200);
    }

    public function testShouldUpdateABook()
    { }

    public function testShouldDeleteABook()
    { }
}
