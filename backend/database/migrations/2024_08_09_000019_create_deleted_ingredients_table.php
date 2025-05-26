<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('deleted_ingredients', function (Blueprint $table) {
            $table->id('deleted_ingredients_id');
            $table->foreignId('ingredients_id')->constrained('ingredients','ingredients_id');
            $table->foreignId('order_id')->constrained('orders','order_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deleted_ingredients');
    }
}
