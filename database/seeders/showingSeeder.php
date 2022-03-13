<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class showingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            DB::table('showing')->insert([
                'name' => Str::random(10),
                'show_time' => Carbon::now()->subMinutes(rand(1, 55)),
            ]);
        }
    }
}
