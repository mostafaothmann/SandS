<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('name', 255);
            $table->string('phone_number', 20);
            $table->string('location', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->foreignId('state_id')->constrained('states','state_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
