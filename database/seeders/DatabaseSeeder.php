<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // tạo bộ csdl mẫu
        // DB <=> SELECT*FROM
        DB::table('users')->insert([
            'name'=>'dai1',
            'email'=>'dai9zpp1',
            'password'=>bcrypt('1233451')
        ]);
    }
}
