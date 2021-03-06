<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersHasFavoriteRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_favorite_recipes', function (Blueprint $table) {
            $table->primary(['user_id', 'recipe_id']);;
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_id');

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')
                ->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_has_favorite_recipes', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('recipe_id');
        });
        Schema::dropIfExists('users_has_favorite_recipes');
    }
}
