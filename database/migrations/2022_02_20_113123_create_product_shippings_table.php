<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

class CreateProductShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_iwill_product')->create('product_shippings', function (Blueprint $table) {
            $databaseUsers = DB::connection('mysql')->getDatabaseName();

            $table->id();
            $table->unsignedBigInteger('product_order_id');
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->on(new Expression($databaseUsers . '.users'));
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('tehsil_id')->nullable();
            $table->unsignedInteger('zip_code')->nullable();
            $table->unsignedInteger('postal_code')->nullable();
            $table->string('post_office')->nullable();
            $table->string('street')->nullable();
            $table->string('house_no')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
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
        Schema::connection('mysql_iwill_product')->dropIfExists('product_shippings');
    }
}
