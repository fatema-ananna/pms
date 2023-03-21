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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
          
            $table->string("first_name",20);
            $table->string("last_name",20);
            $table->string("inmate_name",50);
            $table->string("image");
            $table->string("dob");
            $table->string("address");
            $table->string("phone");
            $table->string("gender",20);
            $table->string("last_visiting_date");
            $table->string("in_time");
            $table->string("out_time");
            $table->string("nic",17);
            $table->string("relation",50);
            $table->string("issuing_authority");
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
        Schema::dropIfExists('visitors');
    }
};
