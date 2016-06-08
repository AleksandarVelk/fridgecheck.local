<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typedishes_id')->unsigned();
            $table->enum('breakfast', ['0', '1']);
            $table->enum('lunch', ['0', '1']);
            $table->enum('dinner', ['0', '1']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->timestamp('updateed_at'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('type_dishes');
    }
}
