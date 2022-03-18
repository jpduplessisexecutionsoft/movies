<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('movie');
            $table->integer('cinema');
            $table->timestamp('show_time');
            $table->timestamps();
        });
        DB::table('movies')->insert(
            array(
                'movie' => 2,
                'cinema' => 2,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 00:00:00')
            ));
        DB::table('movies')->insert(
            array(
                'movie' => 2,
                'cinema' => 2,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 01:00:00')
            ));
        DB::table('movies')->insert(
            array(
                'movie' => 2,
                'cinema' => 2,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 02:00:00')
            ));
        DB::table('movies')->insert(
            array(
                'movie' => 2,
                'cinema' => 2,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 03:00:00')
            ));

        DB::table('movies')->insert(
            array(
                'movie' => 1,
                'cinema' => 1,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 00:00:00')
            ));
        DB::table('movies')->insert(
            array(
                'movie' => 1,
                'cinema' => 1,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 01:00:00')
            ));
        DB::table('movies')->insert(
            array(
                'movie' => 1,
                'cinema' => 1,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 02:00:00')
            ));
        DB::table('movies')->insert(
            array(
                'movie' => 1,
                'cinema' => 1,
                'show_time' => Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2022 03:00:00')
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
