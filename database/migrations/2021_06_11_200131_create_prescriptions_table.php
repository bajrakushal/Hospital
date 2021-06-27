<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->text('phone');
            $table->integer('age');
            $table->date('date');
            $table->text('symptoms');
            $table->text('patient_desc');
            $table->unsignedBigInteger('appointment_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('Pending');
            $table->text('prev_medicine_name')->nullable();
            $table->string('diagnosis')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
}
