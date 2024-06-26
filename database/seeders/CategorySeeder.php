<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('specializations')->insert(['name' => 'علم النفس اللاقياسي',]);
        DB::table('specializations')->insert(['name' => 'علم النفس الخوارقي',]);
        DB::table('specializations')->insert(['name' => 'علم الوراثة السلوكي',]);
        DB::table('specializations')->insert(['name' => 'علم النفس الحيوي',]);
        DB::table('specializations')->insert(['name' => 'علم النفس المعرفي',]);
        DB::table('specializations')->insert(['name' => 'علم النفس المقارن',]);
        DB::table('specializations')->insert(['name' => 'علم النفس الإرشادي',]);
        DB::table('specializations')->insert(['name' => 'علم النفس التنموي',]);
    }
}