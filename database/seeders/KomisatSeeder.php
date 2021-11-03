<?php

namespace Database\Seeders;

use App\Models\Komisat;
use Illuminate\Database\Seeder;

class KomisatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["nama" => "UHO", "keterangan" => "Komsat UHO"],
            ["nama" => "IAIN", "keterangan" => "Komsat IAIN"],
        ];
        Komisat::insert($data);
    }
}
