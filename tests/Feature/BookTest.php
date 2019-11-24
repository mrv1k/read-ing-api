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
        $john = factory(User::class)->create();

        $payload = ['title' => 'DTW', 'pages' => 100, 'user_id' => $john->id];

        $response = $this->postJson('api/books', $payload);

        $response->assertStatus(201);

        $response->assertJson([
            'data' => $payload
        ]);
    }

    public function testCreatedBookShouldBeAccessibleViaUrl()
    {
        $book = factory(Book::class)->create();

        $response = $this->getJson('api/books/1');

        $response->assertStatus(200);
    }

    public function testABookCannotBeUpdatedByAnyoneExceptCreator()
    {
        $john = factory(User::class)->create();
        $this->actingAs($john);
        $payload = ['title' => 'DTW', 'pages' => 100, 'user_id' => $john->id];
        $this->postJson('api/books', $payload);

        $jane = factory(User::class)->create();
        $this->actingAs($jane);

        $response = $this->patchJson('api/books/1', [
            'title' => 'Jane Book'
        ]);

        $response->assertStatus(403);
        // assertSessionHasErrors
        // $response->assertJsonValidationErrors('You can only edit your own books');
        $response->assertJson(['error' => 'You can only edit your own books']);

        // $response->assertSessionHasErrors(['error' => 'You can only edit your own books']);

        // $this->patch($thread->path(), [
        //     'body' => 'derp',
        // ])->assertSessionHasErrors('title');
    }

    public function testBookCreatorCanUpdateABook()
    {
        $john = factory(User::class)->create();
        $this->actingAs($john);
        $payload = ['title' => 'John Book', 'pages' => 100, 'user_id' => $john->id];
        $this->postJson('api/books', $payload);

        $response = $this->patchJson('api/books/1', [
            'title' => 'Updated Book'
        ]);

        $payload['title'] = 'Updated Book';

        $response->assertJson([
            'data' => $payload
        ]);

        $response->assertStatus(200);
    }

    public function testShouldDeleteABook()
    { }
}
