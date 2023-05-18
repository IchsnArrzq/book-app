<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Member::factory()->create([
            'name' => 'Test Member',
            'email' => 'member@testing.com',
        ]);
        \App\Models\Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@testing.com',
        ]);
        \App\Models\Book::factory(1)->create();
        \App\Models\Member::factory(4)->create();
    }
}
