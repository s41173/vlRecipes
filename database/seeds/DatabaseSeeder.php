<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        DB::collection('recipes')->insert([
            'name' => 'Nasi Goreng ala Blue Band',
            'img' => 'http://selerasa.com/images/nasi/nasi_goreng/Resep-Dan-Cara-Membuat-Nasi-Goreng-Rumahan-Spesial-Enak-Gurih-Simpel-Dan-Praktis.jpg',
            'ingredients' => [
                [
                    'name' => 'Nasi putih',
                    'qty' => '600',
                    'unit' => 'gr'
                ],
                [
                    'name' => 'Telur',
                    'qty' => '2',
                    'unit' => 'butir'
                ],
                [
                    'name' => 'Daun bawang, potong',
                    'qty' => '1',
                    'unit' => 'batang'
                ],
                [
                    'name' => 'Wortel, potong rebus',
                    'qty' => '50',
                    'unit' => 'gr'
                ],
                [
                    'name' => 'Royco ayam',
                    'qty' => '1',
                    'unit' => 'sdm'
                ],
                [
                    'name' => 'Bawang merah, iris tipis',
                    'qty' => '5',
                    'unit' => 'butir'
                ],
                [
                    'name' => 'Bawang putih, cincang',
                    'qty' => '3',
                    'unit' => 'siung'
                ],
                [
                    'name' => 'Kecap manis',
                    'qty' => '1/2',
                    'unit' => 'sdm'
                ],
                [
                    'name' => 'Garam',
                    'qty' => '1/2',
                    'unit' => 'sdt'
                ],
                [
                    'name' => 'Lada',
                    'qty' => '1/4',
                    'unit' => 'sdt'
                ],
                [
                    'name' => 'Gula',
                    'qty' => '1/2',
                    'unit' => 'sdt'
                ]
            ],
            'steps' => [
                'Panaskan Blue Band, tumis bawang putih dan bawang merah hingga harum dan matang.',
                'Masukkan sosis, masak sebentar. Tambahkan telur, masak hingga matang lalu tambahkan daun bawang.',
                'Masukkan nasi putih, Royco, garam, lada, gula, dan kecap Bango. Masak hingga semua bumbu tercampur rata dengan nasi.',
                'Angkat dan sajikan dengan telur mata sapi.'
            ]
        ]);
    }
}
