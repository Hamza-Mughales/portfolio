<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColProjectimgsToProjectimg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projectDescs', function (Blueprint $table) {
            //
            $table->renameColumn('project_imgs', 'img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projectDescs', function (Blueprint $table) {
            //
        });
    }
}
