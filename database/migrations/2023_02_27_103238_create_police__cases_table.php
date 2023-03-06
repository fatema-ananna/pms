<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_cases', function (Blueprint $table) {
            $table->id();
            $table->string("first_name",20);
            $table->foreignId("inmate_id");
            $table->string("last_name",20);
            $table->string("court",20);
            $table->string("crime_type");
            $table->string("case_start");
            $table->string("date");
            $table->string("police_station");
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
        Schema::dropIfExists('police__cases');
    }
};
