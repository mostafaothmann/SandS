<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributersTable extends Migration
{
    public function up()
    {
        Schema::create('distributers', function (Blueprint $table) {
            $table->id('distributer_id');
            $table->string('user_name', 255);
            $table->string('first_name', 255);
            $table->string('second_name', 255);
            $table->string('three_name', 255);
            $table->date('birth_date');
            $table->string('phone_number', 20);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->foreignId('chef_id')->constrained('chefs','chef_id');
            $table->foreignId('vehicle_id')->constrained('vehicles', 'vehicle_id'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distributers');
    }
}
