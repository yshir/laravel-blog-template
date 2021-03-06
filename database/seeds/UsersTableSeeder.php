<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'system',
            'email' => 'system@example.com',
            'role' => 'system',
            'password' => Hash::make('testpass'),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('testpass'),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => Hash::make('testpass'),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@example.com',
            'role' => 'editor',
            'password' => Hash::make('testpass'),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        factory(App\User::class, 50)->create();
    }
}
