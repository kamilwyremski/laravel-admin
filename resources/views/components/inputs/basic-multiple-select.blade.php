<div class="col-span-6 sm:col-span-4">
    <label class="block font-medium text-sm text-gray-700" for="{{ $name }}">
        {{ $label }}
    </label>
    <select id="{{ $name }}"
        name="{{ $name }}"
        class="form-select rounded-md shadow-sm mt-1 block w-full"
        @if ($autofocus ?? false) autofocus @endif
        style="{{$style??''}}"
        multiple
        @if ($required ?? false) required @endif>

        @if ($list)
            @foreach ($list as $item)
                <option value="{{ $item['value'] }}" & @if(in_array($item['value'],$values)) selected @endif>{{ $item['name'] }}</option>
            @endforeach
        @endif
    </select>
</div>