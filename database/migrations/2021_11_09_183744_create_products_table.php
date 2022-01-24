<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique()->default('');
            $table->string('title1')->unique()->default('');
            $table->string('category')->default('');;
            $table->integer('count')->default(0);;
            $table->double('price')->default(0.0);;
            $table->string('publisher')->nullable();
            $table->string('platform')->nullable();
            $table->integer('year')->nullable();
            $table->string('user')->nullable();
            $table->string('image')->nullable();
            $table->string('desc')->nullable();
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
}
