@extends('layouts.app')

@section('main-content')

    <x-page-title class="mb-2">{{ $event->title }}</x-page-title>
    <div class="flex mb-8">
        @if($event->categories && $event->categories->count() > 0)
                @foreach($event->categories as $category)
                    <x-category-link :category="$category">{{ $category->name }}</x-category-link>
                @endforeach
        @else
            @php /* TODO: Add the route for the uncategorised. Change this to use the query params/filter system */ @endphp
            <x-category-link>Uncategorised</x-category-link>
        @endif
    </div>
    <p>{{ $event->description }}</p>

@endsection