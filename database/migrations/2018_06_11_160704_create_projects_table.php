<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('project_url')->nullable();
            $table->timestamps();
        });

        Schema::create('plan_project', function(Blueprint $table) {
            $table->unsignedInteger('plan_id')->index();
            $table->unsignedInteger('project_id')->index();
            $table->timestamps();

            $table->foreign('plan_id')
                ->references('id')
                ->on('plans')
                ->onDelete('cascade');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
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
        Schema::dropIfExists('projects');
    }
}
