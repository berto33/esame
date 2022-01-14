<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateTerrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->string('comune')->nullable();
            $table->string('img')->nullable();
            $table->integer('ettari')->nullable();
            $table->string('foglio_catastale')->nullable();
            $table->string('mappa_catastale')->nullable();
            $table->string('parcella_catastale')->nullable();
            $table->string('tipo_terreno')->nullable();
            $table->string('tipo_irrigazione')->nullable();
            $table->string('tipo_offerta')->nullable();
            $table->float('canone_offerta')->nullable();
            $table->boolean('disponibilità')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terrains');
    }
}
