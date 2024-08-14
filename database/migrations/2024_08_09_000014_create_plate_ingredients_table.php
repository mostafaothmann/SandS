<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlateIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('plate_ingredients', function (Blueprint $table) {
            $table->id('plate_ingredients_id');
            $table->foreignId('ingredients_id')->constrained('ingredients','ingredients_id');
            $table->foreignId('plate_id')->constrained('plates','plate_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plate_ingredients');
    }
}
