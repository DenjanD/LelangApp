<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MasyarakatTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
        DB::table('masyarakats')->insert([
            'nama_lengkap' => $faker->name,
            'username' => $faker->userName,
            'password' => $faker->password,
            'telp' => $faker->phoneNumber 
        ]);
        }
    }
}

