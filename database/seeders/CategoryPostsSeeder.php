<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Category_posts')->insert([
            ['name' => 'teknologi'],
            ['name' => 'pendidikan'],
            ['name' => 'kesehatan'],
        ]);
    }
}
