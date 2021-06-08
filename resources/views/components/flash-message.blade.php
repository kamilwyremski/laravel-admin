@if (Session::has('flash_error'))
    <div class="p-4 w-full col-span-6 bg-red-100 text-red-500 text-center">
        {{ Session::get('flash_error') }}
    </div>
@endif

@if (Session::has('flash_message'))
    <div class="p-4 w-full col-span-6 bg-green-100 text-green-500 text-center">
        {{ Session::get('flash_message') }}
    </div>
@endif