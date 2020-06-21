<?php

use Illuminate\Database\Seeder;
use App\Prodi;

class TebelProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_prodi = [
            [
                'kd_prodi' => 'TM',
                'nama_prodi' => 'Teknik Mesin',
            ],
            [
                'kd_prodi' => 'TP',
                'nama_prodi' => 'Teknik Pendingin',
            ],
            [
                'kd_prodi' => 'RPL',
                'nama_prodi' => 'Rekayasa Perangkat Lunak',
            ]
        ];

        foreach ($list_prodi as $prodi){
            Prodi::create($prodi);
        }
    }
}
