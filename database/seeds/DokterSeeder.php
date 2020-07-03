<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 17; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('dokter')->insert([
    			'nama_dokter' => $faker->name
    		]);

    	}
    }
}
