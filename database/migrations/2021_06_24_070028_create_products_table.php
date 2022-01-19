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
            $table->string('name')->unique();
            $table->string('brand_name')->default(' ');
            $table->string('category_name')->default(' ');
            $table->string('vat_name')->default(' ');
            $table->string('image')->nullable();
            $table->string('attribute_set')->nullable();
            $table->float('price')->comment('selling price');
            $table->text('description')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->string('tag')->nullable();
            $table->string('vat_status')->comment('0=disable, 1=enable');
            $table->string('status')->default('Drafts');
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
