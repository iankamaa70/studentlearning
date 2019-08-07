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
            'name' => 'Ian kamau himga',
            'email' => 'iankamaa70@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('3333dreamer'),
            'isAdmin' => 1,
            'isApproved' => 1,
        ]);
    }
}
