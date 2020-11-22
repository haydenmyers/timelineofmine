@extends('layouts.master')

@section('app')
    <div class="container mx-auto px-4 pt-6">
        <div class="flex">
            <div class="w-64">
                @section('sidebar')
                    <nav>
                        <ul>
                            <li>
                                <x-sidebar-link route="home">Home</x-link>
                            </li>
                            <li>
                                <x-sidebar-link route="createEvent">Create New Event</x-link>
                            </li>
                            <li>
                                <x-sidebar-link route="categories">Categories</x-link>
                            </li>
                            <li>
                                <x-sidebar-link route="account" params="{{ current_user()->id }}">Account</x-link>
                            </li>
                        </ul>
                    </nav>
                @show
            </div>
            <div class="flex-grow max-w-2xl">
                @yield('main-content')
            </div>
        </div>
    </div>
@endsection