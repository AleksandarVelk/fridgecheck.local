<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang', 5)->default('en');
            $table->string('name', 255)->unique();
            $table->string('slug', 255);
            $table->longText('preparation');
            $table->integer('time_preparation');
            $table->mediumInteger('persons');
            $table->enum('demands', ['very easy', 'easy', 'moderate', 'demanding', 'very demanding']);
            $table->text('serving');
            $table->text('advice');
            $table->string('energy_value', 255);
            $table->text('nutritional_value');
            $table->mediumInteger('author');
            $table->string('country', 5);
            $table->enum('status', ['0', '1']);
            $table->enum('delete_rec', ['0', '1']);       
            $table->timestamps();
            $table->dateTime('public_at');
            $table->enum('source', ['cfw', 'web']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipes');
    }
}
