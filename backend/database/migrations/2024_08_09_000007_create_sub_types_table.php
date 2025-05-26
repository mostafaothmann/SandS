<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTypesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_types', function (Blueprint $table) {
            $table->id('sub_type_id');
            $table->string('sub_type', 255);
            $table->foreignId('type_id')->constrained('types', 'type_id'); 
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('sub_types');
    }
}
