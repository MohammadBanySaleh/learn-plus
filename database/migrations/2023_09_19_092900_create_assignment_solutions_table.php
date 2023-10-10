<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_solutions', function (Blueprint $table) {
            $table->id();
            $table->text('solution')->nullable();
            $table->string('file')->nullable();
            $table->string('mark');
            $table->unsignedBigInteger('assignment_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->timestamps();

            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
                ->onDelete('cascade');

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_solutions');
    }
};