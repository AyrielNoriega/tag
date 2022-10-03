<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store()
    {
        $this
            ->post('tags', ['name' => 'PHP'])
            ->assertRedirect('/');

            //VERifica que la siguiente info existe en db
        $this->assertDatabaseHas('tags', ['name' =>'PHP']);
    }

    public function test_delete()
    {
        $tag = Tag::factory()->create();
        $this
            ->delete("tags/$tag->id")
            ->assertRedirect('/');

            //VERifica que la siguiente info no existe en db
        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }

    public function test_validate()
    {
        $this
            ->post('tags', ['name' => ''])
            ->assertSessionHasErrors('name');
    }
}
