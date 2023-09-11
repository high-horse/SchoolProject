<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalToiletFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_toilet_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('school_id')->nullable();
            $table->double('first_aid_service')->default(0);
            $table->text('transport_facility')->nullable();
            $table->double('urinal_teacher')->nullable();
            $table->double('urinal_boy')->nullable();
            $table->double('no_of_toilet_boy')->nullable();
            $table->double('no_of_toilet_girl')->nullable();
            $table->double('no_of_toilet_teacher')->nullable();
            $table->double('no_of_toilet_with_water_facility')->nullable();
            $table->unsignedInteger('user_id')->nullable();
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
        Schema::dropIfExists('medical_toilet_facilities');
    }
}
