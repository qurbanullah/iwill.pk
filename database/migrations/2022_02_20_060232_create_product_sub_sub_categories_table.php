<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_iwill_product')->create('product_sub_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('product_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_sub_category_id')->constrained()->cascadeOnDelete();
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
        Schema::connection('mysql_iwill_product')->dropIfExists('product_sub_sub_categories');
    }
}
