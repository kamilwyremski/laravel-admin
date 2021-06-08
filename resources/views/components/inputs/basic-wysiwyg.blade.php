<div class="mb-2">
    <label class="block font-medium text-sm text-gray-700" for="{{$name}}">
        {{$label}}
    </label>
    <textarea
        class="form-textarea rounded-md shadow-sm mt-1 block w-full"
        name="{{$name}}"
        style="{{$style??''}}"
        id="wysiwyg_{{$name}}"
        @if ($required??false) required @endif>{!! $value??''!!}</textarea>
</div>

<script>
    window.onload = function() {
        CKEDITOR.replace('wysiwyg_{{$name}}', {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    }
</script>