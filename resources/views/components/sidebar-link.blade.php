<a class="@if(strpos(Route::currentRouteName(), $route) === 0)) text-green-600 @endif" href="{{ route($route, $params ?? null) }}">
    {{ $slot }}
</a>

@php
    // TODO: Find a way to show the active link when on a child page of the sidebar link. 
@endphp