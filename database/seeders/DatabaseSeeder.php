<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Admin::create([
            'uuid' => Str::orderedUuid(),
            'name' => 'Admin',
            'email' => 'admin@quadque.tech',
            'password' => Hash::make('admin')
        ]);

        User::create([
            'uuid' => Str::orderedUuid(),
            'name' => 'Rajin',
            'email' => 'rajin@quadque.tech',
            'password' => Hash::make('123123')
        ]);

        User::create([
            'uuid' => Str::orderedUuid(),
            'name' => 'Student',
            'email' => 'student@quadque.tech',
            'password' => Hash::make('123123')
        ]);
    }
}
