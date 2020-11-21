<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models\User;
use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Broma;
use App\Models\BromaCategoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234')
        ]);

        Autor::factory(12)->create();
        Broma::factory(20)->create();
        Categoria::factory(6)->create();
        BromaCategoria::factory(25)->create();
    }
}
