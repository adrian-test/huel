<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->string('admin_graphql_api_id', 100)->nullable();
            $table->text('body_html')->nullable();
            $table->string('created_at', 100)->nullable();
            $table->string('handle', 100)->nullable();
            $table->string('id', 100)->nullable();
            $table->string('product_type', 100)->nullable();
            $table->string('published_at', 100)->nullable();
            $table->string('published_scope', 100)->nullable();
            $table->text('tags')->nullable();
            $table->string('template_suffix', 100)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('updated_at', 100)->nullable();
            $table->string('vendor', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
