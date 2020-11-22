<form action="{{ $action }}" method="{{ $method ?? 'POST' }}" @isset($enctype)enctype="{{ $enctype }}"@endisset class="bg-white border shadow-md rounded-md px-8 py-6">
    @csrf
    @isset ($method)
        @method($method)
    @endif

    {{ $slot }}
</form>