<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('note', 1000)->nullable();
            $table->string('comment', 500)->nullable();
            $table->integer('rate')->nullable();
            $table->foreignId('client_id')->constrained('clients','client_id');
            $table->foreignId('plate_id')->constrained('plates','plate_id');
            $table->foreignId('distributer_id')->constrained('distributers','distributer_id')->nullable();
            $table->foreignId('price_id')->constrained('prices','price_id');
            $table->foreignId('status_id')->constrained('order_statuses','status_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
