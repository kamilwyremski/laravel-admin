<div class="mb-2">
    <label class="block font-medium text-sm text-gray-700" for="{{$name}}">
        {{$label}}
    </label>
    <textarea
        class="form-textarea rounded-md shadow-sm mt-1 block w-full"
        name="{{$name}}"
        style="{{$style??''}}"
        @if ($required??false) required @endif>{{$value??''}}</textarea>
</div>