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
            $table->foreignId("frontend_auth_id")->constrained("frontend_auth");
            $table->string("first_name", 20);
            $table->string("last_name", 20);
            $table->string("inmate_id");
            $table->string("image");
            $table->string("dob");
            $table->string("address");
            $table->date("appointment_date");
            $table->string("number");
            $table->string("country");
            $table->string("religon");
            $table->string("nid", 17);
            $table->string("gender");
            $table->string("relation");
            $table->string("status")->nullable();

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
