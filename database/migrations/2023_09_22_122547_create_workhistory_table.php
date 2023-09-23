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
        Schema::create('workhistory', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->string('jobtitle');
            $table->string('location');
            $table->string('role');

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
        Schema::dropIfExists('workhistory');
    }
};