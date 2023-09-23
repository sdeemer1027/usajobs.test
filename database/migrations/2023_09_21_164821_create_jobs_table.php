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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('user_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['onsite', 'hybrid','remote']);
            $table->enum('corf', ['Contract', 'FullTime','PartTime'])->nullable();
            $table->float('salarymin')->nullable();
            $table->float('hourlymin')->nullable();
            $table->float('hourlymax')->nullable();
            $table->float('salarymax')->nullable();
            $table->enum('status', ['expired', 'active', 'disabled'])->default('active');
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
        Schema::dropIfExists('jobs');
    }
};
