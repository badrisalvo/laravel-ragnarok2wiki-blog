<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Tags;
use App\Category;

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
            'name' => 'badrisalvo',
            'email' => 'subadriyanasv@gmail.com',
            'password' => Hash::make('Kmzwa8awaa2024'),
            'tipe' => 0,
        ]);

        Category::create([
            'name' => 'Tips & Info',
            'slug' => 'tips-info',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Bug & Feature',
            'slug' => 'bug-feature',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Hack & Mod',
            'slug' => 'hack-mod',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'Market',
            'slug' => 'market',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'name' => 'Tips & Info',
            'slug' => 'tips-info',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'name' => 'Bug & Feature',
            'slug' => 'bug-feature',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'name' => 'Hack & Mod',
            'slug' => 'hack-mod',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tags::create([
            'name' => 'Market',
            'slug' => 'market',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
