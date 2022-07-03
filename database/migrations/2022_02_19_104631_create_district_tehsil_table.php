<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictTehsilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_iwill_address')->create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id');
            $table->string('district',255);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();

            $table->foreign('state_id')->references('id')->on('states')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::connection('mysql_iwill_address')->create('tehsils', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('district_id');
            $table->string('tehsil',255);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();

            $table->foreign('district_id')->references('id')->on('districts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // Artisan::call('db:seed', [
        //     '--class' => DistrictTehsilTableSeeder::class
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_iwill_address')->dropIfExists('districts');
        Schema::connection('mysql_iwill_address')->dropIfExists('tehsils');
    }
}
