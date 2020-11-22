@extends('layouts.app')

@section('main-content')

    <x-page-title>Create a new Category</x-page-title>

    <x-form action="{{ route('storeCategory') }}" enctype="multipart/form-data">
        <x-form-field type="text" name="name">Name</x-form-field>
        <x-form-field type="text" name="color">Colour</x-form-field>
        <x-form-field type="file" name="icon">Icon</x-form-field>

        <button class="btn" type="submit">Create</button>
    </x-form>

@endsection