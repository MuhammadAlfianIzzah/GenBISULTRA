<?php

namespace Database\Seeders;

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
        // $this->call(LaratrustSeeder::class);
        $this->call([
            KomisatSeeder::class,
            LaratrustSeeder::class,
            DevisiSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
