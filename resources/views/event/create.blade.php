@extends('layouts.app')

@section('main-content')
    <x-form action="{{ route('storeEvent') }}">
        <x-form-field name="title">Title</x-form-field>

        <x-form-field type="textarea" name="description">Description</x-form-field>

        <x-form-field type="date" name="date">Event Date</x-form-field>

        <x-form-field
            type="select"
            name="category"
            default="Please Choose"
            :options="$categories"
        >Category</x-form-field>

        <button type="submit" class="btn">Create Event!</button>
    </x-form>
@endsection