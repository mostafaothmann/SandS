<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id('plate_id');
            $table->string('description', 1500);
            $table->string('photo_path', 255);
            $table->string('plate_name', 255);
            $table->foreignId('chef_id')->constrained('chefs','chef_id');
            $table->foreignId('sub_type_id')->constrained('sub_types', 'sub_type_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
