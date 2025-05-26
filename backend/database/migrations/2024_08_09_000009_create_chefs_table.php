<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChefsTable extends Migration
{
    public function up()
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->id('chef_id');
            $table->string('username', 255);
            $table->string('first_name', 255);
            $table->string('second_name', 255);
            $table->string('three_name', 255);
            $table->string('image_path', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->date('birth_date');
            $table->string('mobile_number', 20);
            $table->string('cv_path', 255)->nullable();
            $table->string('location', 255);
            $table->foreignId('state_id')->constrained('states','state_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chefs');
    }
}
