<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;use Illuminate\Support\Facades\DB;

class Tin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tin')->insert([
            'name'=>'dai1',
            'email'=>'dai9zpp1',
            'password'=>'1233451'
        ]);
    }
}
