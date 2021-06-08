<form method="POST" {{ $attributes->merge(['class' => 'admin-form']) }}>
    @csrf
    {{$slot??''}}
    <button class="mt-6 py-2 px-10 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded" type="submit">{{__('admin.Save')}}</button>
</form>
