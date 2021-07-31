<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkidReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekid_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('plan_id')->nullable();
            $table->integer('abel_report_id')->nullable();
            $table->boolean('ekid_status')->default('0');
            $table->integer('payment_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->longText('department_name');
            $table->integer('transport_id')->nullable();
            $table->integer('is_ekid_complated')->default(0);

            $table->longText('title')->nullable();

            $table->integer('user_id');

            $table->integer('nodate')->nullable();
            $table->text('datef')->nullable();
            $table->longText('ekid_on_list');
            $table->longText('ekid_on_list_done');
            $table->longText('ekid_ont_on_list_done');
            $table->longText('not_done_reason');

            $table->decimal('abel_total')->nullable(); // sum of each columns from rows teklala wochi
            $table->decimal('temelash')->nullable();
            $table->decimal('yetekefel')->nullable();  // subtraction form kidmia kifya to abel_total


            $table->longText('voucher_no')->nullable();

            $table->string('approved_by')->nullable(); //finance user
            $table->longText('approved_by_image')->nullable(); //finance user

            $table->longText('sign_name')->nullable(); // id of user hidet
            $table->longText('sign_name_image')->nullable(); // id of user hidet
            $table->longText('sign_name_wana')->nullable(); // id of user azegaj
            $table->longText('sign_name_wana_image')->nullable(); // id of user azegaj
            $table->longText('sign_name_smanager_image')->nullable(); // id of user
            $table->longText('sign_name_wmanager_image')->nullable(); // id of user

            $table->longText('sign_name_artayi')->nullable(); // id of user
            $table->longText('sign_name_manager')->nullable(); // id of user

            $table->longText('sign_name_wmanager')->nullable(); // id of user
            $table->longText('sign_name_smanager')->nullable(); // id of user



            $table->boolean('check_by_hidet')->default('0');
            $table->boolean('check_by_super_hidet')->default('0');
            $table->boolean('check_by_finance')->default('0');


            $table->boolean('check_by_artayi')->default('0');
            $table->boolean('check_by_manager')->default('0');

            $table->boolean('check_by_smanager')->default('0');
            $table->boolean('check_by_wmanager')->default('0');

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
        Schema::dropIfExists('ekid_reports');
    }
}
