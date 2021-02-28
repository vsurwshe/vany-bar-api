<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarBottelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('bar_bottels', function (Blueprint $table) {
            $table->bigIncrements('bar_bottel_id');
            $table->string('bar_bottel_name');
            $table->string('bar_bottel_unit_price');
            $table->string('bar_bottel_per_case_count');
            $table->string('bar_bottel_packing');
            $table->string('bar_bottel_total_qty');
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
        Schema::dropIfExists('bar_bottels');
    }
}
