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
        Schema::create('walk_in_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('walk_in_patient_id')->references('id')->on('walk_in_patients')->cascadeOnDelete();
            $table->string('type_consult');
            $table->date('date_consultation');
            $table->string('time_consultation');
            $table->string('status')->default('Approved');
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
        Schema::dropIfExists('walk_in_appointments');
    }
};
