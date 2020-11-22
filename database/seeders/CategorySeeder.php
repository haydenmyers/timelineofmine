<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Icon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Achievement',
                'slug' => 'achievement',
                'color' => '#6b46c1'
            ],
            [
                'name' => 'Award',
                'slug' => 'award',
                'color' => '#ffd700'
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'color' => '#f6e05e'
            ],
            [
                'name' => 'Financial',
                'slug' => 'financial',
                'color' => '#48bb78'
            ],
            [
                'name' => 'Gift',
                'slug' => 'gift',
                'color' => '#b83280'
            ],
            [
                'name' => 'House',
                'slug' => 'house',
                'color' => '#dd6b20'
            ],
            [
                'name' => 'Job',
                'slug' => 'job',
                'color' => '#2c5282'
            ],
            [
                'name' => 'Love',
                'slug' => 'love',
                'color' => '#e53e3e'
            ],
            [
                'name' => 'People',
                'slug' => 'people',
                'color' => '#d6bcfa'
            ],
            [
                'name' => 'Sickness',
                'slug' => 'sickness',
                'color' => '#b7791f'
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'color' => '#90cdf4'
            ],
        ];

        foreach($categories as $category) {
            // Create an Icon with the same name as the category
            $icon = Icon::create([
                'path' => "/static/icons/{$category['slug']}.svg"
            ]);

            $newCat = new Category();
            $newCat->icon_id = $icon->id;
            $newCat->name = $category['name'];
            $newCat->slug = $category['slug'];
            $newCat->color = $category['color'];
            $newCat->editable = false;
            $newCat->save();
        }
    }
}
