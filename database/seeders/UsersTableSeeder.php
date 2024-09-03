<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create(
            [
                'email' => "admin@gmail.com",
                'password' => Hash::make("P@ssw0rd"),
                'role_id' => 1,
            ]
        );
        User::factory()->create(
            [
                'email' => "webmaster@gmail.com",
                'password' => Hash::make("P@ssw0rd"),
                'role_id' => 2,
            ]
        );
        User::factory()->create(
            [
                'email' => "accountant@gmail.com",
                'password' => Hash::make("P@ssw0rd"),
                'role_id' => 3,
            ]
        );
    }
}
