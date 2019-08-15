<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Administrator',
            'email' => 'wwsisdac@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Admin123'),
            'isAdmin' => 1,
            'isApproved' => 1,
        ]);
    }
}
