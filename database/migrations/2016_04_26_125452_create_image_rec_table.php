<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageRecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_images', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('recimg_id')->unsigned(); 
            $table->string('pin_id', 50);
            $table->string('local_image_path', 255);
            $table->string('source_image', 255);      
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));        
            $table->foreign('recimg_id')->references('id')->on('recipes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipes_images');
    }
}
