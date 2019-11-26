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

    public function testReturnMultipleBooks()
    {
        $books = factory(Book::class, 2)->create();

        $response = $this->getJson('api/books');

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }

    public function testAUserCanCreateABook()
    {
        $john = factory(User::class)->create();

        $this->actingAs($john);

        $payload = ['title' => 'DTW', 'pages' => 100, 'user_id' => auth()->user()->id];

        $response = $this->postJson('api/books', $payload);

        $response->assertStatus(201);

        $response->assertJsonFragment($payload);
    }

    public function testABookShouldBeRetrievable()
    {
        $book = factory(Book::class)->create();

        $response = $this->getJson('api/books/' . $book->id);

        $response->assertStatus(200);
    }

    public function testBookCreatorCanUpdateABook()
    {
        $this->actingAs(factory(User::class)->create());
        $book = factory(Book::class)->create();

        $response = $this->patchJson('api/books/' . $book->id, [
            'title' => 'Updated'
        ]);

        $response->assertJsonFragment(['title' => 'Updated']);

        $response->assertStatus(200);
    }

    public function testNotACreatorCannotUpdateABook()
    {
        $this->actingAs(factory(User::class)->create());
        $johnsBook = factory(Book::class)->create();

        $jane = factory(User::class)->create();
        $this->actingAs($jane);

        $response = $this->patchJson('api/books/1', [
            'title' => 'Jane Takeover Title'
        ]);

        $response->assertStatus(403);
        $response->assertJson(['error' => 'You can only edit your own books']);
    }


    public function testShouldDeleteABook()
    { }
}
