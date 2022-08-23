<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    use DatabaseMigrations, RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_read_all_the_categories()
    {

        $category   = Category::factory()->create(['title' => 'fake']);

        $response   = $this->get('categories');

        $response->assertSee($category->title);
        $response->assertSee($category->description);

        $response->assertSeeText('All Categories');
    }

    /** @test */
    public function a_user_can_read_single_category()
    {

        $category   = Category::create([
            'title'         => 'fake title',
            'description'   => 'fake description'
        ]);

        $response   = $this->get("categories/{$category->id}");

        $response->assertSee($category->title)
            ->assertSee($category->description);
    }

    /** @test */
    public function a_user_can_insert_single_category()
    {

        $category   = Category::create([
            'title'         => 'fake title',
            'description'   => 'fake description'
        ]);

        $response   = $this->get("categories/{$category->id}");

        $response->assertSee($category->title)
                ->assertSee($category->description);


    }
}
