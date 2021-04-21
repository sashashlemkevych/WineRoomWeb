<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWineModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('type');
            $table->string('storage');
            $table->string('strength');
            $table->string('eat');
            $table->string('country');
            $table->string('volume');
            $table->string('count');
            $table->string('temperature');
            $table->string('short_description');
            $table->text('description');
            $table->binary('image')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wine_models');
    }
}
