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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("father_name")->nullable();
            $table->string("gender")->nullable();
            $table->integer("age")->nullable();
            $table->longText("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("emergency_phone")->nullable();
            $table->string("education")->nullable();
            $table->string("cnic")->nullable();
            $table->string("email")->nullable();
            $table->foreignId("course_id")->references("id")->on("courses")->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->foreignId("shift_id")->references("id")->on("shifts")->onDelete("cascade")->onUpdate("cascade")->nullable();
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
        Schema::dropIfExists('students');
    }
};
