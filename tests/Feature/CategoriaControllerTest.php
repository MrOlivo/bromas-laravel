<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoriaControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function loginWithFakeUser()
    {
        $user = new User(['id' => 1, 'name' => 'tester']);
        $this->be($user);
    }

    public function test_categoria_index()
    {
        $this->loginWithFakeUser();

        Categoria::factory(2)->create();

        $response = $this->get(route('categorias.index'));
        $response->assertStatus(200);
    }

    public function test_categoria_store()
    {
        $this->loginWithFakeUser();

        $categoria = Categoria::factory()->makeOne();

        $this->post(route('categorias.store'), $categoria->toArray());
        $this->assertDatabaseHas('categorias', $categoria->toArray());
        $this->assertEquals(1, Categoria::all()->count());
    }

    public function test_categoria_create()
    {
        $this->loginWithFakeUser();

        $response = $this->get(route('categorias.create'));
        $response->assertStatus(200);
    }

    public function test_categoria_update()
    {
        $this->loginWithFakeUser();

        $categoria = Categoria::factory()->createOne();
        $update = $categoria;
        $update->categoria = 'Jokes category';

        $this->put(route('categorias.update', $categoria), $update->toArray());
        $this->assertDatabaseHas('categorias', $update->toArray());
    }

    public function test_categoria_destroy()
    {
        $this->loginWithFakeUser();

        $categoria = Categoria::factory()->createOne();

        $this->delete(route('categorias.destroy', $categoria));
        $this->assertDatabaseMissing('categorias', $categoria->toArray());
    }
}
