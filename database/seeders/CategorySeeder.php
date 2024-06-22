<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('categories')->insert(['name' => 'نساء',]);
        DB::table('categories')->insert(['name' => 'أولاد',]);
        DB::table('categories')->insert(['name' => 'بنات',]);
        DB::table('categories')->insert(['name' => 'رضع',]);
    }
}
