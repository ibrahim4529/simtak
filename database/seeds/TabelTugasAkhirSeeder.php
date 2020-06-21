<?php

use Illuminate\Database\Seeder;
use App\TugasAkhir;
use Faker\Factory as Faker;

class TabelTugasAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_status = ['pengajuan', 'revisi', 'setujui', 'tinjau_ulang', 'tolak'];
        $faker = Faker::create('id_ID');
        for($i = 0 ; $i < 10; $i++){
            TugasAkhir::create([
                'id_user' => rand(2, 10),
                'bidang_ta' => $faker->word,
                'judul_ta'=> $faker->words(3 , true),
                'status' => $list_status[rand(0, 4)],
                'id_pembimbing_1' => rand(2, 10),
                'id_pembimbing_2' => rand(2, 10),
                'dok_pem_bim_ta' => $faker->file('/home/ibrahim/Pictures', '/tmp', false),
                'dok_pem_buku_pedoman' => $faker->file('/home/ibrahim/Pictures', '/tmp', false),
                'dok_krs' => $faker->file('/home/ibrahim/Pictures', '/tmp', false),
                'keterangan' => $faker->text
            ]);
        }
    }
}
