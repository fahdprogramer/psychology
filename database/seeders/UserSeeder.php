<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = Role::create(['name' => 'Admin']);
        $role1 = Role::create(['name' => 'Teacher']);
        $role2 = Role::create(['name' => 'Student']);
        $admin1 = DB::table('users')->insert([
            'name' => 'admin',
            'phone' => '067431' . fake()->unique()->biasedNumberBetween($min = 1000, $max = 9999, $function = 'sqrt'),
            'email' => 'admin@gmail.com',
            'created_at' => now(),
           // 'wilaya' => 'تمنراست',
           // 'address' => 'tamanrasset city',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::orderby('id', 'desc')->first()->assignRole($role);
/* 
        DB::table('users')->insert([
            'name' => 'ميدون محمد',
            'phone' => '067431' . fake()->unique()->biasedNumberBetween($min = 1000, $max = 9999, $function = 'sqrt'),
            'email' => 'teacher1@gmail.com',
            'created_at' => now(),
           // 'wilaya' => 'تمنراست',
           // 'address' => 'tamanrasset city',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::orderby('id', 'desc')->first()->assignRole($role1);
        
        
        DB::table('users')->insert([
            'name' => 'عزاوي عبد الفتاح',
            'phone' => '067431' . fake()->unique()->biasedNumberBetween($min = 1000, $max = 9999, $function = 'sqrt'),
            'email' => 'teacher2@gmail.com',
            'created_at' => now(),
           // 'wilaya' => 'تمنراست',
           // 'address' => 'tamanrasset city',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::orderby('id', 'desc')->first()->assignRole($role1);
        
        DB::table('users')->insert([
            'name' => 'كيرامي فهد',
            'phone' => '067431' . fake()->unique()->biasedNumberBetween($min = 1000, $max = 9999, $function = 'sqrt'),
            'email' => 'test@gmail.com',
           'created_at' => now(),
           // 'wilaya' => 'تمنراست',
           // 'address' => 'tamanrasset city',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::orderby('id', 'desc')->first()->assignRole($role2);

        DB::table('userspecialities')->insert(['user_id' => 3,'speciality_id' => 4]);
        DB::table('userspecialities')->insert(['user_id' => 2,'speciality_id' =>3 ]);

 */
        
    }
}