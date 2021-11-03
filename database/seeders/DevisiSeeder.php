<?php

namespace Database\Seeders;

use App\Models\Devisi;
use Illuminate\Database\Seeder;

class DevisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["nama" => "KOMINFO", "deskripsi" => "Departement KOMINFO"],
            ["nama" => "KWU", "deskripsi" => "Departement Kewirausahaan"],
            ["nama" => "PENDIDIKAN", "deskripsi" => "Departement Pendidikan"],
            ["nama" => "KESMAS", "deskripsi" => "Departement kesehatan Masyarakat"],
            ["nama" => "LINGKUNGAN HIDUP", "deskripsi" => "Departement Lingkungan Hidup"],
        ];
        Devisi::insert($data);
    }
}
