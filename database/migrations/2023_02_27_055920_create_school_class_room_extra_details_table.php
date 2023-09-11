<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassRoomExtraDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_class_room_extra_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('extra_class_room_id')->nullable();
            $table->unsignedInteger('total')->nullable();
            $table->unsignedInteger('school_id')->nullable();
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
        Schema::dropIfExists('school_class_room_extra_details');
    }
}
