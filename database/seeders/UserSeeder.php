<?php

namespace Database\Seeders;

use App\Models\Penerima;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '081234567890',
            'role' => 'admin',
            'password' => bcrypt('admin123')
        ]);

        User::create([
            'name' => 'Kevin Mahardika',
            'email' => 'kevin@gmail.com',
            'phone' => '081234567891',
            'role' => 'user',
            'password' => bcrypt('kevin123')
        ]);

        User::create([
            'name' => 'Angelina Jolie',
            'email' => 'angel@gmail.com',
            'phone' => '081234567892',
            'role' => 'user',
            'password' => bcrypt('angel123')
        ]);
    }
}
