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
          $admin1 = DB::table('users')->insert([
            'name' => 'admin',
            'phone' => '067431' . fake()->unique()->biasedNumberBetween($min = 1000, $max = 9999, $function = 'sqrt'),
            'email' => 'admin@gmail.com',
           // 'wilaya' => 'تمنراست',
           // 'address' => 'tamanrasset city',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::orderby('id', 'desc')->first()->assignRole($role);
        
    }
}
