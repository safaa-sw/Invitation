<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inviteds', function (Blueprint $table) {
            $table->id();
            $table->string('pretitle')->nullable();
            $table->integer('title_id');
            $table->string('fullname');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('password');
            $table->string('email_other')->nullable();
            $table->string('organization')->nullable();
            $table->string('position')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('attendance')->nullable();
            $table->integer('employee_id');
            $table->integer('person_class_id')->nullable();
            $table->integer('seat_id')->nullable();
            $table->string('notify_by_email')->nullable();
            $table->string('notify_by_whatsup')->nullable();
            $table->string('is_attended')->nullable();
            $table->string('req_status')->nullable();
            $table->string('invitation_type');
            $table->string('invitation_lang')->nullable();
            $table->string('in_or_out')->nullable();
            $table->timestamps();

            $table->foreign('title_id')->references('id')->on('titles');
            $table->foreign('employee_id')->references('id')->on('admins');
            $table->foreign('person_class_id')->references('id')->on('person_classes');
            $table->foreign('seat_id')->references('id')->on('seats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inviteds');
    }
}
