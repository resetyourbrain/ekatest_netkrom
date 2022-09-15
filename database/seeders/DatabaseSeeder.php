<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Staff Agen X',
            'username'=> 'agen',
            'password' => bcrypt('agen'),
            'phone'=> '081234567890',
            'email'=> 'agenx@gmail.com',           
            'role' => 'admin'
        ]);
    }
}
