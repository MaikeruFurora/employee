<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('employee_id');
            $table->string('inclusivePeriod')->nullable();
            $table->string('natureOfActivity')->nullable();
            $table->string('noOfDaysCredited')->nullable();
            $table->string('dsoNumber1')->nullable();
            $table->string('inclusiveDates')->nullable();
            $table->string('noOfDaysLeave')->nullable();
            $table->string('serviceCreditBalance')->nullable();
            $table->string('leaveWithoutPay')->nullable();
            $table->string('natureOfLeave')->nullable();
            $table->string('dsoNumber2')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
