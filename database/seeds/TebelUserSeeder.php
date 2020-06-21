<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class TebelUserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        for ($i = 0; $i < 10; $i++ ){
            User::create([
                'nama' => $faker->name,
                'no_identitas' => $faker->nik,
                'id_prodi' => rand(1, 3),
                'id_level_user' => 2,
                'jenis_kelamin' => $jenis_kelamin[rand(0,1)],
                'password' => Hash::make('password'),
            ]);
        }
        User::create(
            [
                'nama' => 'Admin',
                'no_identitas' => 'admin',
                'id_prodi' => rand(1, 3),
                'id_level_user' => 1,
                'jenis_kelamin' => $jenis_kelamin[rand(0,1)],
                'password' => Hash::make('password'),
            ]
        );
    }
}
