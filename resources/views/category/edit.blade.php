@extends('layouts.app')

@section('main-content')

<x-form action="{{ route('updateCategory', $category) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <x-form-field type="text" name="name" value="{{ $category->name }}">Name</x-form-field>
    <x-form-field type="text" name="color" value="{{ $category->color }}">Colour</x-form-field>

    <div class="pb-4">
        @php /* TODO: Have a vue component here to render the current category icon and give the user the ability to swap it out for a new one. */ @endphp
        <button type="button" class="btn">Change Icon</button>
    </div>

    <button class="btn" type="submit">Update</button>
</x-form>

@endsection