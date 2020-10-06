<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoPoliticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_politicos', function (Blueprint $table) {
            $table->id();
            $table->char('departament_id','2');
            $table->char('province_id','4');
            $table->char('district_id','6');
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('archivo');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_politicos');
    }
}
