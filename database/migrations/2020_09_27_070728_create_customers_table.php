<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('accepts_marketing', 100)->nullable();
            $table->string('accepts_marketing_updated_at', 100)->nullable();
            $table->string('admin_graphql_api_id', 100)->nullable();
            $table->string('created_at', 100)->nullable();
            $table->string('currency', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('id', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('last_order_id', 100)->nullable();
            $table->string('last_order_name', 100)->nullable();
            $table->string('marketing_opt_in_level', 100)->nullable();
            $table->string('multipass_identifier', 100)->nullable();
            $table->string('note', 100)->nullable();
            $table->string('orders_count', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('tags', 100)->nullable();
            $table->string('tax_exempt', 100)->nullable();
            $table->string('total_spent', 100)->nullable();
            $table->string('updated_at', 100)->nullable();
            $table->string('verified_email', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
