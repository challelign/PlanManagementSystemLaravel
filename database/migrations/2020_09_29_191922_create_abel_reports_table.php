<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbelReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abel_reports', function (Blueprint $table) {
            $table->id();
//            $table->integer('ekid_report_id');
            $table->integer('user_id');
            $table->integer('ekid_report_id');
            $table->integer('payment_id')->nullable(); //from old table
            $table->integer('transport_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->longText('department_name')->nullable();
            $table->integer('is_abel_complated')->default(0);
            $table->integer('plan_id');
//            $table->string('old_voucher_no')->nullable();


            $table->dateTime('sdate');
            $table->string('splace');
//            $table->time('stime');

            $table->string('dkplace');
            $table->decimal('dkbirr')->nullable();



            $table->string('dmplace');
            $table->decimal('dmbirr')->nullable();

            $table->string('deplace');
            $table->decimal('debirr')->nullable();

            $table->dateTime('workddate');
//            $table->time('workdtime');

            $table->string('adarplace');
            $table->decimal('adarbirr')->nullable();

            $table->decimal('nodatef')->nullable();
            $table->decimal('alga')->nullable();
            $table->decimal('wuloabel_meten')->nullable();
            $table->decimal('transport_birr')->nullable();
            $table->decimal('nedaje_qibat')->nullable();



            $table->decimal('total')->nullable(); // sum of each row



//            $table->integer('transport_id')->nullable();
//            $table->integer('department_id')->nullable();
            $table->string('approved_by')->nullable(); //finance user

            $table->string('sign_name')->nullable(); // id of user hidet
            $table->string('sign_name_wana')->nullable(); // id of user azegaj

            $table->boolean('check_by_hidet')->default('0');
            $table->boolean('check_by_super_hidet')->default('0');
            $table->boolean('check_by_finance')->default('0');

            $table->longText('sign_name_wmanager')->nullable(); // id of user
            $table->longText('sign_name_smanager')->nullable(); // id of user



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
        Schema::dropIfExists('abel_reports');
    }
}
