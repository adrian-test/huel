<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->string('id', 100)->nullable();
            $table->string('variant_id', 100)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('quantity', 100)->nullable();
            $table->string('sku', 100)->nullable();
            $table->string('variant_title', 100)->nullable();
            $table->string('vendor', 100)->nullable();
            $table->string('fulfillment_service', 100)->nullable();
            $table->string('product_id', 100)->nullable();
            $table->string('requires_shipping', 100)->nullable();
            $table->string('taxable', 100)->nullable();
            $table->string('gift_card', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('variant_inventory_management', 100)->nullable();
            $table->string('product_exists', 100)->nullable();
            $table->string('fulfillable_quantity', 100)->nullable();
            $table->string('grams', 100)->nullable();
            $table->string('price', 100)->nullable();
            $table->string('total_discount', 100)->nullable();
            $table->string('fulfillment_status', 100)->nullable();
            $table->string('pre_tax_price', 100)->nullable();
            $table->string('admin_graphql_api_id', 100)->nullable();
            $table->string('order_id', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lines');
    }
}
