<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_iwill_address')->create('addresses', function (Blueprint $table) {
            $databaseUsers = DB::connection('mysql')->getDatabaseName();
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->on(new Expression($databaseUsers . '.users'));
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('district_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('tehsil_id')->constrained()->cascadeOnDelete();
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
            $table->string('phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('state_id')->references('id')->on('states')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('city_id')->references('id')->on('cities')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('district_id')->references('id')->on('districts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tehsil_id')->references('id')->on('tehsils')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_iwill_address')->dropIfExists('addresses');
    }
}
