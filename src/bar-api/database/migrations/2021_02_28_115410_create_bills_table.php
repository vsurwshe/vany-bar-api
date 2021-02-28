<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('bill_item_id');
            $table->string('bill_item_mrp');
            $table->string('bill_item_particulars');
            $table->string('bill_item_packing');
            $table->string('bill_item_cis');
            $table->string('bill_item_bottels');
            $table->string('bill_item_rate');
            $table->string('bill_item_amount');
            $table->bigInteger('bill_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('bill_id')
                    ->references('bill_id')
                    ->on('bill_index')
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
        Schema::dropIfExists('bills');
    }
}
