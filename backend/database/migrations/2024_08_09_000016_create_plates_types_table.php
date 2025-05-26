<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTypesTable extends Migration
{
    public function up()
    {
        Schema::create('plates_type', function (Blueprint $table) {
            $table->id('plate_type_id');
            $table->foreignId('sub_type_id')->constrained('sub_types','sub_type_id');
            $table->foreignId('plate_id')->constrained('plates','plate_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plates_type');
    }
}
