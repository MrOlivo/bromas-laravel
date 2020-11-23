<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBromaCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broma_categorias', function (Blueprint $table) {
            $table->bigInteger('broma_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            // $table->timestamps();
            $table->foreign('broma_id')->references('id')->on('bromas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broma_categorias');
    }
}
