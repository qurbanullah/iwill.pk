<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

class CreateProductTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_iwill_product')->create('product_transactions', function (Blueprint $table) {
            $databaseUsers = DB::connection('mysql')->getDatabaseName();

            $table->id();
            $table->foreignId('product_order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->on(new Expression($databaseUsers . '.users'));
            $table->enum('mode', ['cod', 'card', 'paypal']);
            $table->enum('status', ['pending', 'approved', 'declined', 'refunded'])->default('pending');
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
        Schema::connection('mysql_iwill_product')->dropIfExists('product_transactions');
    }
}
