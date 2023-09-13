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
        Schema::create('walk_in_consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('walk_in_appointment_id')->references('id')->on('walk_in_appointments')->cascadeOnDelete();
            $table->string('medication_intake');
            $table->string('medical_history');
            $table->string('vaccine_received');
            $table->string('diagnosis');
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
        Schema::dropIfExists('walk_in_consultations');
    }
};
