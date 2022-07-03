<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_iwill_product')->create('product_orders', function (Blueprint $table) {
            $databaseUsers = DB::connection('mysql')->getDatabaseName();

            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->on(new Expression($databaseUsers . '.users'));
            $table->decimal('subtotal');
            $table->decimal('discount')->default(0);
            $table->decimal('tax');
            $table->decimal('total');
            $table->string('firstname');
            $table->string('lastname')->nullable();
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
            $table->enum('status', ['ordered', 'delivered', 'canceled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
            $table->date('delivered_date')->nullable();
            $table->date('canceled_date')->nullable();
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
        Schema::connection('mysql_iwill_product')->dropIfExists('product_orders');
    }
}
