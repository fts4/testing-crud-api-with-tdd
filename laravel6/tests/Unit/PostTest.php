<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Tests\RefreshTestDatabase;

class PostTest extends TestCase
{
    // when using in-memory sqlite database, phpunit throws errors
    // if RefreshTestDatabase is not used. Note that RefreshTestDatabase
    // is a trait that uses RefreshDatabase
    use RefreshTestDatabase;

    public function testCanShowWelcomePage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('tdd'));
        $response->assertStatus(200);
    }

    public function testGetOnIndexPage()
    {
        $this->withoutExceptionHandling();

        // index - PostController
        $response = $this->get(route('posts'));
        $response->assertStatus(200);
    }


    public function test_can_create_post() {

        $this->withoutExceptionHandling();

        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];

        $this->assertTrue(true);

        $this->post(route('posts.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_can_update_post() {

        $this->withoutExceptionHandling();

        $post = factory(Post::class)->create();

        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph
        ];

        $this->put(route('posts.update', $post->id), $data)
            ->assertStatus(200)
            ->assertJson($data);

        $this->assertDatabaseHas('post', $data);
    }

    public function test_can_show_post() {

        $this->withoutExceptionHandling();

        $post = factory(Post::class)->create();

        $this->get(route('posts.show', $post->id))
            ->assertStatus(200);
    }

    public function test_can_delete_post() {

        $this->withoutExceptionHandling();

        $post = factory(Post::class)->create();

        $this->delete(route('posts.delete', $post->id))
            ->assertStatus(204);
    }

    public function test_can_list_posts() {

        $this->withoutExceptionHandling();

        $posts = factory(Post::class, 2)->create()->map(function ($post) {
            return $post->only(['id', 'title', 'content']);
        });

        $this->get(route('posts'))
            ->assertStatus(200)
            ->assertJson($posts->toArray())
            ->assertJsonStructure([
                '*' => [ 'id', 'title', 'content' ],
            ]);
    }
}
