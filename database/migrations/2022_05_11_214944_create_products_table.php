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
        Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('description');
                $table->integer('pricz');
                $table->string('slug')->unique();
                $table->integer('perex')->nullable();
                $table->date('published_at')->nullable();
                $table->boolean('enabled')->default(false);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::dropIfExists('products');
    }
};
