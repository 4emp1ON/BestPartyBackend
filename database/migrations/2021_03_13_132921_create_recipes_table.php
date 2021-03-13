<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 191);
            $table->unsignedBigInteger('category_id');
            $table->enum('difficult', ['simple', 'light', 'medium', 'hard', 'master']);
            $table->string('cook_time');
            $table->string('standard_portion');
            $table->string('glass');
            $table->string('alcohol_amount');
            $table->text('description');
            $table->text('how_to');

            $table->foreign('category_id')->references('id')->on('recipe_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign('category_id');
        });
        Schema::dropIfExists('recipes');
    }
}
