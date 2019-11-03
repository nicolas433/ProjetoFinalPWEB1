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
            $table->bigIncrements('id');
            $table->string('name');
			$table->float('price');
            $table->text('description');
            $table->boolean('active')->nullable();
            $table->string('img_url')->nullable();
            $table->boolean('operating')->default(1);
            
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
 
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
