<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('bin_number')->nullable();
            $table->string('mobile_banking_type')->nullable();
            $table->string('mobile_banking_number')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
