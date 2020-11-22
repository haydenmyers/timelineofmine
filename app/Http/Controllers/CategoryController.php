<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::where('editable', 0)
                    ->orWhere('user_id', '=', current_user()->id)
                    ->withCount(['events' => function(Builder $query) {
                        $query->where('user_id', '=', current_user()->id);
                    }])
                    ->orderBy('editable', 'asc')
                    ->orderBy('name', 'asc')
                    ->get();
        return view('category.index', compact('categories'));
    }

    public function create() {
        return view('category.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'color' => ['nullable', 'max:50'],
            'icon' => ['image']
        ]);
        $attributes['user_id'] = current_user()->id;
        $attributes['slug'] = Str::slug($attributes['name'], '-');
        $attributes['editable'] = true;

        if (request('icon')) {
            $iconPath = request('icon')->store('icons');
            $icon = Icon::create([
                'user_id' => current_user()->id,
                'path' => $iconPath
            ]);
            $attributes['icon_id'] = $icon->id;
        }

        Category::create($attributes);

        return redirect(route('categories'));
    }
}
