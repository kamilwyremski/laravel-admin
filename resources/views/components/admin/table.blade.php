<div class="w-full" style="overflow-x:auto;">
    <table class="p-6 bg-white rounded shadow" style="min-width:100%">
        <thead>
            <tr class="bg-gray-100 uppercase text-gray text-xs text-left">
                @foreach($titles as $title)
                    <th class="py-4 px-2 font-sans font-thin">{{__($title)}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{$slot}}
        </tbody>
    </table>
</div>
