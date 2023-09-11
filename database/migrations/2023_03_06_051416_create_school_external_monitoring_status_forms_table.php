<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolExternalMonitoringStatusFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_external_monitoring_status_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('teaching_method_id')->nullable();
            $table->unsignedInteger('school_id')->nullable();
            $table->unsignedInteger('academic_session_id')->nullable();
            $table->boolean('child_club')->default(false);
            $table->unsignedInteger('external_monitoring_status_id')->nullable();
            $table->double('total')->default(0);
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
        Schema::dropIfExists('school_external_monitoring_status_forms');
    }
}
