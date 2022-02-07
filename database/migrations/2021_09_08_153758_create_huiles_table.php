<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("engin_id")->unsigned()->nullable();
            $table->string("chauffeur")->nullable();
            $table->string("engin_reference")->nullable();
            $table->string("type_huile")->nullable();
            $table->integer("quantite")->nullable();
            $table->string("approvisionneur")->nullable();
            $table->dateTime("reapprovisionnement")->nullable();
            $table->timestamps();
            $table->foreign("engin_id")->references("id")->on("engins")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('huiles');
    }
}
