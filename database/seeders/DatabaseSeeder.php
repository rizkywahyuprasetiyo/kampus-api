<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Mahasiswa;
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
        // Mahasiswa::create([
        //     'nama' => 'Rizky Wahyu Prasetiyo',
        //     'nim' => '171220372',
        //     'alamat' => 'Jalan Lintas Selatan, Gang Tani'
        // ]);

        // Mahasiswa::create([
        //     'nama' => 'Bang Ghozy',
        //     'nim' => '171220381',
        //     'alamat' => 'Jalan Ahmad Yani, Gang Paris 1'
        // ]);

        // Mahasiswa::create([
        //     'nama' => 'Asrul Abdullah',
        //     'nim' => '171229382',
        //     'alamat' => 'Jalan Pramuka, Sungai Rengas'
        // ]);
        Dosen::create([
            'nama' => 'Budiman, M.Kom',
            'nim' => '118384838',
            'alamat' => 'Jalan Lintas Selatan, Gang Tani'
        ]);

    }
}