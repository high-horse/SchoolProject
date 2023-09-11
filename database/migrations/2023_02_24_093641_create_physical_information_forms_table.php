<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalInformationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_information_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('school_id');
            $table->unsignedInteger('school_location')->nullable();
            $table->double('ropani',10,2)->nullable();
            $table->double('aana',10,2)->nullable();
            $table->double('paisa',10,2)->nullable();
            $table->double('daam',10,2)->nullable();
            $table->double('biggha',10,2)->nullable();
            $table->double('kattha',10,2)->nullable();
            $table->double('dhur',10,2)->nullable();
            $table->unsignedBigInteger('total_no_of_computer')->default(0);
            $table->unsignedBigInteger('computers_for_teaching')->default(0);
            $table->unsignedBigInteger('computer_for_admin')->default(0);
            $table->boolean('is_internet')->default(true);
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
        Schema::dropIfExists('physical_information_forms');
    }
}
