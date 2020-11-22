@extends('layouts.app')

@section('main-content')
    @if($events)
        <div class="mb-6 bg-white rounded shadow p-4">
            <form action="{{ route('home') }}" method="GET">
                <div class="w-full flex justify-between items-end">
                    @php
                    // TODO: Sort by: Date desc (default), Date asc
                    // TODO: Date Range: Show a calendar where a user can pick a single month or click a "from - to" relationship
                    // TODO: Categories: All (default), ...
                    @endphp

                    <div class="flex-grow flex justify-between">
                        {{-- Categories --}}
                        @if ($categories)
                            <div>
                                <label for="filter-categories">Categories:</label>
                                <select name="categories" id="filter-categories">
                                    <option selected value>All Categories</option>
                                    @foreach ($categories as $category)
                                        @if($category->events_count)
                                            <option value="{{ $category->id }}">{{ $category->name }} ({{ $category->events_count }})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        {{-- Date Picker --}}
                        <div>
                            <label>Date Picker:</label>
                            <button class="btn" type="button">Select Dates</button>
                        </div>

                        {{-- Sort by --}}
                        <div>
                            <label for="filter-sort">Sort By:</label>
                            <select name="sortBy" id="filter-sort">
                                <option value="newest">Newest</option>
                                <option value="oldest">Oldest</option>
                            </select>
                        </div>
                    </div>
                    
                    <button class="btn ml-8" type="submit">Apply</button>
                </div>
            </form>
        </div>
        @foreach ($events as $event)
            @php // TODO: Move this to the database query, group by date, then output events in chunks as opposed to one by one
                $previousDate = $loop->index > 0 ? $events[$loop->index - 1]->date : null;
                $isSameDate = $previousDate === $event->date;
            @endphp

            <div class="flex">
                {{-- Timeline --}}
                <div class="flex w-32 flex-shrink-0">
                    <span class="flex items-center w-24 text-xs text-gray-500">@unless($isSameDate){{ $event->date }}@endunless</span>
                    <span class="bg-gray-400 w-px h-full inline-block items-center relative">
                        @unless($isSameDate)<span class="bg-gray-400 w-4 h-px absolute left-0 top-1/2 transform -translate-y-1/2"></span>@endunless
                    </span>
                </div>

                {{-- Event Tile --}}
                <a href="{{ $event->path() }}" class="flex-grow ml-1">
                    <div class="flex bg-white rounded-sm shadow mb-2 pl-0 transform transition duration-300 ease-in-out hover:shadow-md hover:translate-x-1">
                        <span class="w-2 rounded-l-sm" style="background-color: {{ $event->primaryCategory()->color ?? '#cbd5e0' }}"></span>
                        <div class="flex-grow px-4 py-2">
                            <div class="mb-1">
                                <h1 class="text-xl mb-0 text-gray-700 font-semibold">{{ $event->title }}</h1>
                            </div>
                            <p class="text-gray-800">{{ $event->description }}</p>
                            <div class="mt-4">
                                @foreach ($event->categories as $category)
                                    @isset($category->icon)
                                        <img src="{{ $category->icon->path }}" width="16" alt="{{ $category->name }} icon.">
                                    @endisset
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <h2 class="mb-4 text-xl">You have no events logged yet. Make your first one now!</h2>
        <a class="btn" href="{{ route('createEvent') }}">Create First Event</a>
    @endif
@endsection