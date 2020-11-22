<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    protected $fillable = ['description', 'date'];

    public function show(Event $event) {
        return view('event.show', compact('event'));
    }

    public function create()
    {
        // Get all of the default categories and all categories that the user has created.
        $categories = Category::where('editable', 0)
                        ->orWhere('user_id', '=', current_user()->id)
                        ->orderBy('editable', 'asc')
                        ->orderBy('name', 'asc')
                        ->get()
                        ->pluck('id', 'name')
                        ->toArray();
        return view('event.create', compact('categories'));
    }

    public function store()
    {
        // Validate and attach user id
        $categories = Category::get()->pluck('id')->toArray();
        $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:21845'],
            'date' => ['required', 'date'],
            'category' => ['nullable', Rule::in($categories)]
        ]);
        $attributes['user_id'] = current_user()->id;

        // Create the Event
        if (array_key_exists('category', $attributes)) {
            Event::create($attributes)->categories()->attach($attributes['category']);
        } else {
            Event::create($attributes);
        }

        return redirect(route('home'));
    }
}
