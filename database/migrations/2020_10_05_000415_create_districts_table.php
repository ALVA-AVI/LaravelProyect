<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->char('id',6)->primary();
            $table->string('name');
            $table->char('province_id',4);
            $table->char('departament_id',2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('departament_id')->references('id')->on('departaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
