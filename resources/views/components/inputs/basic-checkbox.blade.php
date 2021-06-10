<div class="mb-2">
    <input id="{{ $name }}"
        name="{{ $name }}"
        class="form-checkbox rounded-md shadow-sm align-middle"
        type="checkbox"
        @if ($value ?? false) checked @endif
        {{-- @if ($autofocus) autofocus @endif --}}
        @if ($required ?? false) required @endif
    />

    <label class="font-medium text-sm text-gray-700 align-middle ml-1" for="{{ $name }}">
        {{ $label }}
    </label>
</div>