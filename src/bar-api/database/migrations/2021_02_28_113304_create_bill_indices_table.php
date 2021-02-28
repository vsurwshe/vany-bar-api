<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_index', function (Blueprint $table) {
            $table->bigIncrements('bill_id');
            $table->string('name');
            $table->string('invoice_number');
            $table->string('pan_number');
            $table->string('vat_number');
            $table->string('date');
            $table->string('tp_number');
            $table->string('sub_total');
            $table->string('startup_fee');
            $table->string('carraying_forwrding');
            $table->string('cash_discount');
            $table->string('gross_amount');
            $table->integer('total_cis');
            $table->integer('total_bottels');
            $table->string('net_amount');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')
                    ->references('user_id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_index');
    }
}
