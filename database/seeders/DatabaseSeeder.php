<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'superadmin',
            'verification' => 'approved',
        ]);
        DB::table('users')->insert([
            'name' => 'Wetechs',
            'email' => 'weltechs@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'company' => 2,
            'company_name' => 'Weltechs',
            'verification' => 'approved',
        ]);
    }
}
