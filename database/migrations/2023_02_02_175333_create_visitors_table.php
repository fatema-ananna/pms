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
          
            $table->string("image");
            $table->string("dob");
            $table->string("address");
            $table->string("number");
            $table->string("country");
            $table->string("religon");
            $table->string("nid",17);
            $table->string("gender");
           
       
       
            $table->string("relation");

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
