<?php

namespace Tests\Feature;

use App\Models\Autor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Broma;
use App\Models\Categoria;
use App\Models\User;
use App\Models\BromaCategoria;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BromaControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function loginWithFakeUser()
    {
        $user = new User(['id' => 1, 'name' => 'tester']);
        $this->be($user);
    }

    public function test_broma_index()
    {
        $this->loginWithFakeUser();

        // Debemos tener un autor en la BDD
        Autor::factory(3)->create();
        // Debemos tener categorías en la BDD
        Categoria::factory(5)->create();
        // Debemos tener bromas en la BDD
        Broma::factory(4)->create();
        // Debemos tener relaciones broma-categoria en la BDD
        BromaCategoria::factory(2)->create();

        $response = $this->get(route('bromas.index'));
        $response->assertStatus(200);
    }

    public function test_broma_store()
    {
        $this->loginWithFakeUser();

        // Debemos tener un autor en la BDD
        $autor = Autor::factory()->createOne();

        $broma = Broma::factory()->createOne(['autor_id' => $autor->id]);
        // Debemos tener categorías en la BDD
        $categorias = Categoria::factory(4)->create();

        $this->post(route('bromas.store'), [
            $broma->toArray(),
            $categorias
        ]);

        $this->assertDatabaseHas('bromas', $broma->toArray());
        $this->assertEquals(1, Broma::all()->count());
    }

    public function test_broma_create()
    {
        $this->loginWithFakeUser();

        $response = $this->get(route('bromas.create'));
        $response->assertStatus(200);
    }

    public function test_broma_update()
    {
        $this->loginWithFakeUser();

        // Debemos tener un autor en la BDD
        Autor::factory(3)->create();
        // Debemos tener categorías en la BDD
        $categorias = Categoria::factory(5)->create();
        $bromas = Broma::factory(4)->create();
        BromaCategoria::factory(3)->create();
        
        $broma = $bromas[0];

        $this->assertDatabaseHas('bromas', $broma->toArray());

        // Creamos una nueva categoría
        $categorias = Categoria::factory(2)->create();
        // Cambiamos de categoría a la broma
        $this->put(route('bromas.update', $broma), [$categorias]);

        $this->assertDatabaseHas('bromas', $broma->toArray());
    }

    public function test_broma_destroy()
    {
        $this->loginWithFakeUser();
    
        // Debemos tener un autor en la BDD
        Autor::factory(3)->create();
        // Debemos tener categorías en la BDD
        Categoria::factory(5)->create();
        // Debemos tener bromas en la BDD
        $bromas = Broma::factory(4)->create();
        // Debemos tener relaciones broma-categoria en la BDD
        BromaCategoria::factory(2)->create();

        $broma = $bromas[2];

        $this->delete(route('bromas.destroy', $broma));
        $this->assertDatabaseMissing('bromas', $broma->toArray());
    }
}
