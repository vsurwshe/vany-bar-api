<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_index', function (Blueprint $table) {
            $table->bigIncrements('tp_index_id');
            $table->string('tp_number');
            $table->string('date');
            $table->string('name');
            $table->string('address');
            $table->string('permit_number');
            $table->string('total_cases');
            $table->string('total_bottels');
            $table->string('route_by');
            $table->string('purpose');
            $table->string('name_sales');
            $table->string('address_sales');
            $table->string('driver_name');
            $table->string('vahical_number');
            $table->string('license_number');
            $table->string('driver_number');
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
        Schema::dropIfExists('tp_index');
    }
}
