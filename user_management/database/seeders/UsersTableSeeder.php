<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password="12345";
        User::create([
            'name'=>'Bashir',
            'email'=>'Super@example1.com',
            'password'=>Hash::make($password),
        ]);
    }
}
