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
        Schema::create('inmate_deposit', function (Blueprint $table) {
            $table->id();
            $table->string("inmate_id");
            $table->double("available_amount");
            $table->string("transaction_id");
            $table->string("status");


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
        Schema::dropIfExists('inmate_deposit');
    }
};
