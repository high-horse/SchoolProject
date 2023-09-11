<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassRoomDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_class_room_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('school_id')->nullable();
            $table->unsignedInteger('class_room_id')->nullable();
            $table->unsignedInteger('no_of_male')->nullable();
            $table->unsignedInteger('no_of_female')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('academic_session_id')->nullable();
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
        Schema::dropIfExists('school_class_room_details');
    }
}
