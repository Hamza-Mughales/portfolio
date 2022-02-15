<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectDesc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->string('project_img',255);
            $table->integer('project_id')->unsigned();  //fk
            $table->foreign('project_id')->references('id')->on('project');
            $table->text('description')->nullable();
            $table->integer('order')->default(1);
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
        Schema::dropIfExists('projectDesc');
    }
}
