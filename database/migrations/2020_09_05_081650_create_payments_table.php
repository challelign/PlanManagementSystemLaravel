<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('wuloabel')->nullable();
            $table->integer('user_id');//  user for
            $table->text('pdate');//  user for
            $table->integer('plan_id')->unique();
            $table->string('approved_by');
            $table->string('approved_by_image')->nullable();
            $table->integer('transport')->nullable();
            $table->integer('nafta_oil')->nullable();
            $table->integer('metebabekiya')->nullable();
            $table->integer('other')->nullable();
            $table->integer('total');
            $table->boolean('is_teworardual')->default('0');

            $table->string('voucher_no');
//            $table->string('inwords')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
