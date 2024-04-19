<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Add Users
         *
         */
        if (User::where('email', '=', 'admin@artlume.io')->first() === null) {

            $newUser = User::create([
                'name' => 'We3World',
                'email' => 'admin@artlume.io',
                'password' => bcrypt('adminadmin'),
            ]);

            $newTestUser = User::create([
                'name' => 'We3World',
                'email' => 'test@artlume.io',
                'password' => bcrypt('adminadmin'),
            ]);

        }
    }
}