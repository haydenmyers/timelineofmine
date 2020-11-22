<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        // Get all available categories
        $categories = Category::all();

        foreach ($categories as $key => $category) {
            $index = $key + 1;
            
            Event::create([
                'title' => $category->name,
                'description' => 'Colour code: ' . $category->color,
                'date' => "2020-11-0{$index}",
                'user_id' => $user->id
            ])->categories()->attach($category);;
        }
    }
}
