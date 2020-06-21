<?php

use Illuminate\Database\Seeder;
use App\LevelUser;
class TebelLevelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_level_user = [
            [
                'slug' => 'admin',
                'nama' => 'Admin'
            ],
            [
                'slug' => 'mahasiswa',
                'nama' => 'Mahasiswa'
            ],
            [
                'slug' => 'dosen',
                'nama' => 'Dosen'
            ],
        ];
        foreach ($list_level_user as $level_user){
            LevelUser::create($level_user);
        }
    }
}
