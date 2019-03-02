<?php

use Illuminate\Database\Seeder;

class BloodTypesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('blood_types')->insert([
                ['name' => 'B+'],
                ['name' => 'B-'],
                ['name' => 'A+'],
                ['name' => 'A-'],
                ['name' => 'O+'],
                ['name' => 'O-'],
                ['name' => 'AB+'],
                ['name' => 'AB-']
        ]);
    }

}
