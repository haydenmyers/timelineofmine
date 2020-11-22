@extends('layouts.app')

@section('main-content')
<p>Name: {{ $user->name }}</p>
<p>ID: {{ $user->id }}</p>
@endsection