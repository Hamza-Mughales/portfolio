<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColumnProjectimgToProjectimgs extends Migration
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
            $table->renameColumn('project_img', 'project_imgs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projectDesc', function (Blueprint $table) {
            //
        });
    }
}
