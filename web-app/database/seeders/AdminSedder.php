<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class AdminSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password=Hash::make('1234');
        User::create([
            'firstname'=>'Admin User',
            'lastname'=>'Admin User',
            'email'=>'admin@example.com',
            'password' => ($password),
            'confirmpassword'=>($password),
        ]);
    }
}
