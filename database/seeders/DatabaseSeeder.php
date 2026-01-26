<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pajak',
            'email' => 'admin@bkud.go.id',
            'password' => Hash::make('admin123'),
        ]);
    }
}
