<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeighingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weighing', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number');
            $table->string('supplier');
            $table->string('product');
            $table->string('plate');
            $table->dateTime('first_weight_time')->nullable();
            $table->dateTime('second_weight_time')->nullable();
            $table->integer('first_weight')->nullable();
            $table->integer('second_weight')->nullable();
            $table->integer('nett_weight')->nullable();
            $table->string('first_weight_picture')->nullable();
            $table->string('second_weight_picture')->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weighing');
    }
}
