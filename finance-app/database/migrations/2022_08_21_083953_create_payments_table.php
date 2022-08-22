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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empId');
            $table->unsignedInteger('attId');
            $table->integer('attendAmount');
            $table->integer('illAmount');
            $table->integer('absenceAmount');
            $table->timestamps();

            // $table->foreign('empId')->references('id')->on('employees');
            // $table->foreign('attId')->references('id')->on('attendances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
