@extends('layouts.app')

@section('main-content')

<div class="flex justify-between items-baseline mb-8">
    <x-page-title>Categories</x-page-title>
    <a href="{{ route('createCategory') }}" class="btn">Create New Category</a>
</div>

<div class="relative">
    <div class="sticky left-0 top-0">
        <div class="flex shadow bg-gray-300 py-3 rounded-t">
            <span class="w-2"></span>
            <div class="flex flex-grow pr-4">
                <span class="w-16 text-center">Icon</span>
                <span class="w-1/5 text-center">Name</span>
                <span class="w-1/4 text-center">Number of Events</span>
                <span class="w-1/4 text-center">Related Media</span>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-b shadow overflow-hidden">
        @forelse ($categories as $category)
            <div class="flex border-t border-gray-300">
                <span class="w-2" style="background-color: {{ $category->color }}"></span>
                <div class="flex items-center flex-grow pr-4 py-2">
                    <div class="w-16 text-center flex justify-center items-center">
                        @isset($category->icon)
                            <img src="{{ $category->icon->path }}" width="16" alt="house icon">
                        @endisset
                    </div>
                    <h3 class="w-1/5 text-center">{{ $category->name }}</h3>
                    <span class="w-1/4 text-center">
                        <a href="#" class="text-center text-blue-500 hover:underline hover:text-blue-800">{{ $category->events_count }}</a>
                    </span>
                    <span class="w-1/4 text-center">
                        @php
                            // TODO: Once I have created a way to assign media to the event, get that count of media associated to a category here
                        @endphp
                        <a href="#" class="text-center text-blue-500 hover:underline hover:text-blue-800">number here</a>
                    </span>
                    @if($category->editable)
                        <a href="#" class="ml-auto mr-4 text-green-600 hover:underline hover:text-green-800">Edit</a>
                        <a href="#" class="ml-auto text-red-600 hover:underline hover:text-red-800">Delete</a>
                    @endif
                </div>
            </div> 
        @empty
            <div class="text-center p-4">
                <p class="mb-4">Sorry, you have no categories.</p>
                <a href="#" class="btn">Create my first category</a>
            </div>
        @endforelse
    </div>
</div>

<h2 class="mb-2 mt-8">Notes:</h2>
<ul class="list-disc ml-5">
    <li>When deleting a category, remember NOT to cascade and delete associated events, etc.</li>
    <li>Need to create an icons table which will have a one to one relationship with the categories.</li>
    <li>Allow a user to upload their own icon or choose from one of ours.</li>
</ul>

@endsection