<div class="col-span-6 sm:col-span-4">
    <input id="{{ $name }}"
        name="{{ $name }}"
        class="form-checkbox rounded-md shadow-sm align-middle"
        type="checkbox"
        checked="{{ $value }}"
        autocomplete="{{ $name }}"
        {{-- @if ($autofocus) autofocus @endif --}}
        @if ($required ?? false) required @endif
    />

    <label class="font-medium text-sm text-gray-700 align-middle ml-1" for="{{ $name }}">
        {{ $label }}
    </label>
</div>