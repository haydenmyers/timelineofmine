<?php

namespace App\Http\Controllers;

use App\QueryFiltering\EventFilters;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(EventFilters $filters)
    {
        $events = Event::where('user_id', current_user()->id)
                    ->with('categories.icon')
                    ->filter($filters)
                    ->get();

        // Only get categories that have posts. Order by system defaults first, then user created, in alphabetical order.
        // Get categories::
        // -> That have events
        // -> and these events were created by the current user
        // TODO: Change this query from: Fetching all categories, to: Fetching only the categories needed
        $categories = Category::where('user_id', '=', current_user()->id)
                    ->orWhere('editable', false)
                    ->withCount(['events' => function(Builder $query) {
                        $query->where('user_id', '=', current_user()->id);
                    }])
                    ->orderBy('editable', 'asc')
                    ->orderBy('name', 'asc')
                    ->get();

        return view('home', compact('events', 'categories'));
    }
}
