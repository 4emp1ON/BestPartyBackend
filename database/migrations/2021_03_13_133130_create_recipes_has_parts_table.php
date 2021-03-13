<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesHasPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_has_parts', function (Blueprint $table) {
            $table->primary(['part_id', 'recipe_id']);;
            $table->unsignedBigInteger('part_id');
            $table->unsignedBigInteger('recipe_id');
            $table->string('part_amount');

            $table->foreign('part_id')->references('id')
                ->on('parts')->onDelete('cascade');
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
        Schema::table('recipes_has_parts', function (Blueprint $table) {
          $table->dropForeign('part_id');
          $table->dropForeign('recipe_id');
        });

            Schema::dropIfExists('recipes_has_parts');
    }
}
