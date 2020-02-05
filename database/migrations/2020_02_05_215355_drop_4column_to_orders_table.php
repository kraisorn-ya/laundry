<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop4columnToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('promotion_id');
            $table->dropColumn('total_price_discount');
            $table->dropColumn('pay');
            $table->dropColumn('send_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('promotion_id')->index()->nullable();
            $table->decimal('total_price_discount',7,2)->nullable();
            $table->string('pay')->nullable();
            $table->integer('send_status')->nullable();
        });
    }
}
