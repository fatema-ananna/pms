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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string("first_name",20);
            $table->string("last_name",20);
            $table->string("image");
           $table->foreignId("user_id")->constrained("users");
            $table->string("dob");
            $table->string("address");
            $table->string("phone",20);
            $table->string("gender",20);
            $table->string("designation",50);
            $table->string("religon",50);
            $table->string("nic",17);
            $table->string("assign_in");
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
        Schema::dropIfExists('staff');
    }
};
