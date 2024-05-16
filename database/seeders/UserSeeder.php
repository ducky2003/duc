<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'),
            'is_admin' => true,
        ]);
        User::create([
            'name' => 'Nguyen Duc',
            'email' => 'nguyenduc@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true,
        ]);
        User::create([
            'name' => 'Tran Linh',
            'email' => 'tranlinh@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true,
        ]);
        User::create([
            'name' => 'Nguyen Yen',
            'email' => 'nguyenyen@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true,
        ]);
        User::create([
            'name' => 'Le Chinh',
            'email' => 'lechinh@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true,
        ]);
    }
}
