<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_iwill_products')->create('products', function (Blueprint $table) {
            $databaseUsers = DB::connection('mysql')->getDatabaseName();
            // $databaseBusinesses = DB::connection('mysql_iwill_businesses')->getDatabaseName();
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('short_description');
            $table->text('description');
            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();
            $table->string('SKU')->unique();
            $table->boolean('stock_status')->default(false);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('product_banner_image')->nullable();
            $table->string('product_images')->nullable();
            $table->boolean('is_active')->default(false);
            $table->foreignId('user_id')->constrained()->on(new Expression($databaseUsers . '.users'));
            // $table->foreignId('business_id')->constrained()->cascadeOnDelete()->nullable()->on(new Expression($databaseBusinesses . '.businesses'));
            $table->foreignId('product_vendor_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('product_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_sub_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_sub_sub_category_id')->constrained()->cascadeOnDelete()->nullable();
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
        Schema::dropIfExists('products');
    }
}
