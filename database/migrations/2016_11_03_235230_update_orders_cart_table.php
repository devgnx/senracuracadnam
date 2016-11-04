<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrdersCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->decimal('quantity', 20, 3);
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->decimal('quantity', 20, 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function($table) {
            $table->dropColumn('quantity');
        });

        Schema::table('cart_items', function($table) {
            $table->dropColumn('quantity');
        });
    }
}
