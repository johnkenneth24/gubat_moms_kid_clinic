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
            $table->double('weight');
            $table->double('height');
            $table->string('blood_pressure');
            $table->string('medication_intake')->nullable(); 
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
        Schema::dropIfExists('walk_in_consultations');
    }
};
