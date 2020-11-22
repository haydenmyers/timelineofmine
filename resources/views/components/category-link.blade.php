@if(isset($category))
    <a href="{{ $category->path() }}" class="group inline-flex justify-center items-center px-3 py-1 rounded-full border-2" style="border-color: {{ $category->color }};">
        <span class="text-gray-700 pr-2 group-hover:text-black">{{ $slot }}</span>
        @if($category->icon)
            <img src="{{ $category->icon->path }}" width="16" alt="Icon for {{ $category->name }}">
        @endif
    </a>
@else
    <a href="{{ route('category', 'uncategorised') }}" class="group inline-flex justify-center items-center px-3 py-1 rounded-full border-2 text-gray-700">
        <span class="text-gray-700 pr-2 group-hover:text-black">{{ $slot }}</span>
    </a>
@endif