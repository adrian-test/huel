<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
        
            $table->string('admin_graphql_api_id', 100)->nullable();
            $table->string('app_id', 100)->nullable();
            $table->string('browser_ip', 100)->nullable();
            $table->string('buyer_accepts_marketing', 100)->nullable();
            $table->string('cancel_reason', 100)->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('cart_token', 100)->nullable();
            $table->string('checkout_id', 100)->nullable(); 
            $table->string('checkout_token', 100)->nullable();
            $table->timestamp('closed_at')->nullable(); 
            $table->string('confirmed', 100)->nullable(); 
            $table->string('contact_email', 100)->nullable();  
            $table->string('currency', 100)->nullable(); 
            $table->string('current_total_duties_set', 100)->nullable(); 
            $table->string('customer_locale', 100)->nullable(); 
            $table->string('device_id', 100)->nullable(); 
            $table->string('email', 255)->nullable();
            $table->string('financial_status', 100)->nullable(); 
            $table->string('fulfillment_status', 100)->nullable(); 
            $table->string('gateway', 100)->nullable(); 
            $table->string('id', 255)->nullable(); 
            $table->string('landing_site', 100)->nullable(); 
            $table->string('landing_site_ref', 100)->nullable(); 
            $table->string('location_id', 100)->nullable(); 
            $table->string('name', 100)->nullable(); 
            $table->string('note', 255)->nullable(); 
            $table->string('number', 100)->nullable();
            $table->string('order_number', 100)->nullable(); 
            $table->string('order_status_url', 255)->nullable(); 
            $table->string('original_total_duties_set', 100)->nullable(); 
            $table->string('phone', 100)->nullable(); 
            $table->string('presentment_currency', 100)->nullable(); 
            $table->string('processed_at',100)->nullable(); 
            $table->string('processing_method', 100)->nullable(); 
            $table->string('reference', 100)->nullable(); 
            $table->string('referring_site', 100)->nullable(); 
            $table->string('source_identifier', 100)->nullable(); 
            $table->string('source_name', 100)->nullable(); 
            $table->string('source_url', 100)->nullable(); 
            $table->string('subtotal_price', 100)->nullable(); 
            $table->string('tags', 100)->nullable(); 
            $table->string('taxes_included', 100)->nullable(); 
            $table->string('test', 100)->nullable(); 
            $table->string('token', 100)->nullable(); 
            $table->string('total_discounts', 100)->nullable(); 
            $table->string('total_line_items_price', 100)->nullable(); 
            $table->string('total_price', 100)->nullable(); 
            $table->string('total_price_usd', 100)->nullable(); 
            $table->string('total_tax', 100)->nullable(); 
            $table->string('total_tip_received', 100)->nullable(); 
            $table->string('total_weight', 100)->nullable(); 
            $table->string('user_id', 255)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
