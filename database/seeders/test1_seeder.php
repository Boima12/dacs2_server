<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class test1_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test1')->insert([
            ['name' => 'Alice', 'hobby' => 'Reading'],
            ['name' => 'Bob', 'hobby' => 'Gaming'],
            ['name' => 'Charlie', 'hobby' => 'Cooking'],
        ]);        
    }
}
