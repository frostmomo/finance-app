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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('divId');
            $table->unsignedInteger('posId');
            $table->timestamps();

            $table->foreign('divId')->references('id')->on('divisions');
            $table->foreign('posId')->references('id')->on('positions');
        });

        Schema::table('payments', function (Blueprint $table) {

            $table->foreign('empId')->references('id')->on('employees');
            $table->foreign('attId')->references('id')->on('attendances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
