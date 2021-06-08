<div class="mb-2">
    <label class="block font-medium text-sm text-gray-700" for="{{ $name }}">
        {{ $label }}
    </label>
    <input id="{{ $name }}"
        name="{{ $name }}"
        class="form-input rounded-md shadow-sm mt-1 block w-full"
        type="{{ $type ?? 'text' }}"
        value="{{ $value }}"
        autocomplete="{{ $name }}"
        @if (!empty($autofocus)) autofocus @endif
        @if (!empty($required)) required @endif
    />
</div>