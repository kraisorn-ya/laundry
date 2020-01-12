<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('services');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index();
            $table->integer('service_type_id')->index()->nullable();
            $table->integer('admin_id')->index()->nullable();
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('pay')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
}
