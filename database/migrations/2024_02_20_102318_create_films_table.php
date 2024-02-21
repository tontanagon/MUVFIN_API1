<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id('film_id');
            $table->string('title',100);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('length');
            $table->float('rating',2,1);
            $table->string('actor');
            $table->mediumText('imgUrl');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('category_id')
                ->on('categories')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
};
