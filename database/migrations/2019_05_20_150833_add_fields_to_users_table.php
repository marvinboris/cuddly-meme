<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('link')->unique();
            $table->date('birthdate');
            $table->enum('sex', ['M','F']);
            $table->bigInteger('activity_area_id')->unsigned();
            $table->text('specialization');
            $table->string('phone');
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('cv_file_id')->unsigned(); //(files table)
            $table->bigInteger('pic_file_id')->unsigned()->nullable(); //(profile picture)
            $table->bigInteger('video_file_id')->unsigned()->nullable(); //(short video of 3min)
            $table->string('social_link1')->nullable();
            $table->string('social_link2')->nullable();
            $table->string('social_link3')->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->softDeletes();

            $table->foreign('activity_area_id')->references('id')->on('activity_areas');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('cv_file_id')->references('id')->on('files');
            $table->foreign('pic_file_id')->references('id')->on('files');
            $table->foreign('video_file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['activity_area_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['cv_file_id']);
            $table->dropForeign(['pic_file_id']);
            $table->dropForeign(['video_file_id']);

            $table->dropColumn('link');
            $table->dropColumn('birthdate');
            $table->dropColumn('sex');
            $table->dropColumn('activity_area_id');
            $table->dropColumn('specialization');
            $table->dropColumn('phone');
            $table->dropColumn('city_id');
            $table->dropColumn('cv_file_id');
            $table->dropColumn('pic_file_id');
            $table->dropColumn('video_file_id');
            $table->dropColumn('social_link1');
            $table->dropColumn('social_link2');
            $table->dropColumn('social_link3');
            $table->dropColumn('views');
            $table->dropSoftDeletes();
        });
    }
}
