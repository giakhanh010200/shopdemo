<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('123456'),
                'permissions' => "1"
            ],
            [
                'name' => 'admin2',
                'email' => 'admin456@gmail.com',
                'password' => Hash::make('something123'),
                'permissions' => "1"
            ]
        ];
        Admin::insert($data);
    }
}
