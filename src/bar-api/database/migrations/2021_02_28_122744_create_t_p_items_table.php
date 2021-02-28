<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_items', function (Blueprint $table) {
            $table->bigIncrements('tp_items_id');
            $table->string('tp_item_varity_name');
            $table->string('tp_item_strength_of_vv');
            $table->string('tp_item_strength_of_the_bottel');
            $table->string('tp_item_mrp');
            $table->string('tp_item_number_cases');
            $table->string('tp_item_number_bottels');
            $table->string('tp_item_total_bottels');
            $table->string('tp_item_batch_number');
            $table->string('tp_item_month_of_mfg');
            $table->string('tp_item_prev_bottels_qty');
            $table->string('tp_item_bottel_id');
            $table->timestamps();
            $table->bigInteger('tp_index_id')->unsigned()->index();
            $table->foreign('tp_index_id')
                    ->references('tp_index_id')
                    ->on('tp_index')
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
        Schema::dropIfExists('tp_items');
    }
}
