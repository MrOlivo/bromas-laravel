<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Autor;
use App\Models\User;

class AutorControllerTest extends TestCase
{
    // 'create' persists to the database while 'make' just creates a new instance of the model.
    use DatabaseMigrations;

    public function loginWithFakeUser()
    {
        $user = new User(['id' => 1, 'name' => 'tester']);
        $this->be($user);
    }

    public function test_autor_index()
    {
        $this->loginWithFakeUser();

        Autor::factory(2)->create();

        $response = $this->get(route('autores.index'));
        $response->assertStatus(200);
    }

    public function test_autor_store()
    {
        $this->loginWithFakeUser();

        $autor = Autor::factory()->makeOne();

        $this->post(route('autores.store'), $autor->toArray());
        $this->assertDatabaseHas('autors', $autor->toArray());
        $this->assertEquals(1, Autor::all()->count());
    }

    public function test_autor_create()
    {
        $this->loginWithFakeUser();

        $response = $this->get(route('autores.create'));
        $response->assertStatus(200);
    }

    public function test_autor_update()
    {
        $this->loginWithFakeUser();

        $autor = Autor::factory()->createOne();
        $update = $autor;
        $update->nombre = "Benito Bodoque";

        $this->put(route('autores.update', $autor), $update->toArray());
        $this->assertDatabaseHas('autors', $update->toArray());
    }

    public function test_autor_destroy()
    {
        $this->loginWithFakeUser();

        $autor = Autor::factory()->createOne();

        $this->delete(route('autores.destroy', $autor));
        $this->assertDatabaseMissing('autors', $autor->toArray());
    }
}
