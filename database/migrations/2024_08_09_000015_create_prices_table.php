<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id('price_id');
            $table->integer('person_number');
            $table->decimal('price', 10, 2);
            $table->integer('discount')->nullable();
            $table->foreignId('plate_id')->constrained('plates','plate_id'); // يتم تحديد اسم الجدول فقط
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
