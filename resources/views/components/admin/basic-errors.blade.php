@if ($errors->any())
    <div class="col-span-6 sm:col-span-4 mb-4">
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif