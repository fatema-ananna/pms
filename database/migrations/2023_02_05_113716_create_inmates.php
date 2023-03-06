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
        Schema::create('inmates', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("image");
            $table->string("dob");
            $table->string("address");
            $table->string("phone",20);
            $table->string("gender",20);
            $table->string("country",50);
            $table->string("religon",50);
            
            $table->foreignId("ward_id");
            $table->string("relatives_name");
            $table->string("relatives_number");
            $table->string("relation");
            $table->string("activity");
            $table->string("punishment");
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
        Schema::dropIfExists('inmates');
    }
};
