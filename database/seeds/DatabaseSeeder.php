<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TebelProdiSeeder::class);
        $this->call(TebelLevelUserSeeder::class);
        $this->call(TebelUserSeeder::class);
//        $this->call(TabelTugasAkhirSeeder::class);
    }
}
