<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePannesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pannes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("engin_id")->unsigned()->nullable();
            $table->string("engin_reference")->nullable();
            $table->text("type_panne")->nullable();
            $table->boolean("status")->default(false);
            $table->string("mecanicien")->nullable();
            $table->string("chauffeur")->nullable();
            $table->dateTime("repare_le")->nullable();
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
        Schema::dropIfExists('pannes');
    }
}
