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
            $table->foreignId("inmate_id")->constrained("inmates");;
            $table->string("first_name",20);
           
            $table->string("last_name",20);
            $table->string("court",20);
            $table->foreignId("crime_id")->constrained("crimes");
            $table->string("case_start");
            $table->date("date");
            $table->foreignId("station_id",)->constrained("stations");
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