<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id('type_id');
            $table->string('type', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}
