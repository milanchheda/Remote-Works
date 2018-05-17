<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('source_slug');
            $table->text('body');
            $table->unsignedInteger('job_source_id');
            $table->boolean('published')->default(false);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('job_source_id')->references('id')->on('job_sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('company')) {
            Schema::table('company', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
            });
        }

        if(Schema::hasTable('job_sources')) {
            Schema::table('job_sources', function (Blueprint $table) {
                $table->dropForeign(['job_source_id']);
            });
        }

        Schema::dropIfExists('job_posts');
    }
}
