<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_appointment_consults', function (Blueprint $table) {
          $table->id();
          $table->foreignId('book_appointment_id')->references('id')->on('book_appointments')->cascadeOnDelete();
          $table->double('weight');
          $table->double('height');
          $table->string('blood_pressure');
          $table->string('medication_intake')->nullable();
          $table->string('medical_history')->nullable();
          $table->string('vaccine_received')->nullable();
          $table->string('diagnosis')->nullable();
          $table->softDeletes();
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
        Schema::dropIfExists('book_appointment_consults');
    }
};
