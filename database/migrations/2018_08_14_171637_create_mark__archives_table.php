<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark__archives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("student_id");
            $table->integer("quiz")->nullable();
            $table->integer("exam")->nullable();
            $table->integer("term")->nullable();
            $table->integer("year")->nullable();
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
        Schema::dropIfExists('mark__archives');
    }
}
