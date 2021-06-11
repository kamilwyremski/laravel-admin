<div class="mb-2">
    <label class="block font-medium text-sm text-gray-700" for="input_{{ $name }}">
        {{ $label }}
    </label>
    <a id="link_{{ $name }}" data-input="input_{{ $name }}" data-preview="holder_{{ $name }}" class="btn btn-primary">
        <img id="holder_{{ $name }}" src="{{ $value ?? asset('/images/no_image.png') }}" onerror="this.src='{{ asset('/images/no_image.png') }}'" style="margin-top:15px;max-height:100px;">
    </a>
    <input id="input_{{ $name }}"
        name="{{ $name }}"
        class="form-input rounded-md shadow-sm mt-1 block w-full"
        type="{{ $type ?? 'text' }}"
        value="{{ $value }}"
        autocomplete="{{ $name }}"
        @if (!empty($autofocus)) autofocus @endif
        @if (!empty($required)) required @endif
    />
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        lfm('link_{{ $name }}', 'image');
    })
</script>