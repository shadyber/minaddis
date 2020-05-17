<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (range(1,20) as $index) {
            DB::table('videos')->insert([

            ]);
        }


    }
}
