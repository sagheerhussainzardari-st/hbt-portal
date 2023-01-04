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
            $table->string("name");
            $table->string("father_name");
            $table->string("gender");
            $table->integer("age");
            $table->longText("address");
            $table->string("phone");
            $table->string("emergency_phone");
            $table->string("education");
            $table->string("cnic");
            $table->string("email");
            $table->foreignId("course_id")->references("id")->on("courses")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("shift_id")->references("id")->on("shifts")->onDelete("cascade")->onUpdate("cascade");
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
