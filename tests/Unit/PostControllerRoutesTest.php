<?php

namespace Tests\Unit;

use App\Http\Controllers\PostController;
use App\Models\Post;
use PHPUnit\Framework\TestCase;


class PostControllerRoutesTest extends TestCase
{

    public function test_post_controller_store(): void
    {
        $postRoute = Post::factory()->create();
        $response = $this->post(route('post.store', ['post' => $postRoute->id]));
        $response->assertStatus(200);
    }

    public function test_post_controller_show(): void
    {
        $postRoute = Post::factory()->create();
        $response = $this->get(route('post.show', ['post' => $postRoute->id]));
        $response->assertStatus(200);
    }

    public function test_post_controller_update(): void
    {
        $postRoute = Post::factory()->create();
        $response = $this->put(route('post.update', ['post' => $postRoute->id]));
        $response->assertStatus(200);
    }
}
