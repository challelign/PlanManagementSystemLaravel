<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('startdate');
            $table->text('enddate');
            $table->integer('nodate');
            $table->longText('title');
            $table->integer('is_plan_complated')->default(0);
            $table->boolean('status')->default('0');
            $table->integer('payment_id')->nullable();
            $table->integer('transport_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->longText('department_name');
            $table->longText('sign_name')->nullable(); // id of user
            $table->longText('sign_name_image')->nullable(); // id of user

            $table->boolean('pre_payment');



            $table->longText('sign_name_wana')->nullable(); // id of user
            $table->longText('sign_name_wana_image')->nullable(); // id of user
            $table->longText('sign_name_smanager_image')->nullable(); // id of user
            $table->longText('sign_name_wmanager_image')->nullable(); // id of user

            $table->longText('sign_name_artayi')->nullable(); // id of user
            $table->longText('sign_name_manager')->nullable(); // id of user

            $table->longText('sign_name_wmanager')->nullable(); // id of user
            $table->longText('sign_name_smanager')->nullable(); // id of user
            $table->longText('cancel_name')->nullable(); // id of user
//            $table->longText('cancel_name_wana_image')->nullable(); // id of user
            $table->longText('cancel_name_wana')->nullable(); // id of user

            $table->longText('cancel_name_smanager')->nullable(); // cancel
            $table->longText('cancel_name_manager')->nullable(); // id of user
            $table->boolean('cancel')->default('0');





            $table->longText('task');

            $table->boolean('check_by_hidet')->default('0');
            $table->boolean('check_by_super_hidet')->default('0');
            $table->boolean('check_by_finance')->default('0');

            $table->boolean('check_by_smanager')->default('0');
            $table->boolean('check_by_wmanager')->default('0');

            $table->boolean('check_by_artayi')->default('0');
            $table->boolean('check_by_manager')->default('0');


            $table->boolean('need_kidme_kifya')->default('0');

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
        Schema::dropIfExists('plans');
    }
}
