<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => Str::random(12),
                'email' => Str::random(12) . '@gmail.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
