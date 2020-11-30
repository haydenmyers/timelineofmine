@php
   $uid = create_form_id($name ?? ''); 
@endphp

<div class="mb-4">
    <label for="{{ $uid }}">{{ $slot }}</label>

    @switch($type ?? '')
        @case('textarea')
            <textarea name="{{ $name ?? '' }}" id="{{ $uid }}">{{ old($name) ?? '' }}</textarea>
            @break
        @case('select')
            <select name="{{ $name ?? '' }}" id="{{ $uid }}">
                <option disabled @unless(old($name)) selected @endunless value>{{ $default ?? 'Please Choose' }}</option>
                @foreach ($options as $optionTitle => $option)
                    <option value="{{ $option }}" @if(old($name) == $option) selected @endif>{{ $optionTitle }}</option>
                @endforeach
            </select>
            @break
        @default
            <input type="{{ $type ?? 'text' }}" name="{{ $name ?? '' }}" id="{{ $uid }}" @if($name && old($name)) value="{{ old($name) }}" @elseif(isset($value) && $value) value="{{ $value }}" @endif>
    @endswitch

    @error($name)
        <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>