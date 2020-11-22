<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\IconSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'John Doe',
            'email' => 'john@test.test',
            'password' => Hash::make('password')
        ]);

        $this->call([
            CategorySeeder::class,
            EventSeeder::class
        ]);
    }
}
