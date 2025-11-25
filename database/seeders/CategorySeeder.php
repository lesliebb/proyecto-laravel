<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Technology'],
            ['name' => 'Science'],
            ['name' => 'Sports'],
            ['name' => 'Travel'],
            ['name' => 'Lifestyle'],
            ['name' => 'Food'],
            ['name' => 'Business'],
            ['name' => 'Education'],
            ['name' => 'Entertainment'],
            ['name' => 'Health'],
        ]);
    }
}
