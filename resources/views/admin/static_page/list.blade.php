<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            {{ __('admin.Static pages') }}
        </h2>
        <x-btn-link :href="route('admin_static_page_add')">
            {{ __('admin.Add new page') }}
        </x-btn-link>
    </x-slot>

    <div class="p-10">

        @if (count($static_pages)>0)
            <x-admin.table :titles="['admin.Position','admin.Page name','admin.Date','admin.Edit','admin.Remove']" sortable>
                @foreach ($static_pages as $static_page)
                    <tr class="border-b border-gray-100" data-sort="{{ $static_page->name }}">
                        <td class="text-center">
							<input type="hidden" name="ids[]" form="form_positions" value="{{ $static_page->id }}">
							<i class="sortable-handle">{{ $loop->index + 1 }}</i>
						</td>
                        <td class="text-left"><a href="{{route('static_page_show',$static_page)}}" target="_blank">{{ $static_page->name}}</a></td>
                        <td class="text-left">{{ $static_page->created_at}}</td>
                        <td class="text-center">
                            <a href="{{ route('admin_static_page_edit', $static_page) }}">
                                <x-icons.edit width="20" height="20" />
                            </a>
                        </td>
                        <td class="text-center">
                            <form method="POST" onsubmit="return confirm('<?= __('admin.Are you sure?') ?>');" action="{{route('admin_static_page_remove',$static_page)}}">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <x-icons.trash width="20" height="20" />
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-admin.table>

            <div class="mt-4 flex space-x-4">
                <x-button onclick="sortTable()">{{ __('Arrange it alphabetically') }}</x-button>

                <form method="post" id="form_positions" action="{{ route('admin_static_page_positions') }}">
                    @csrf
                    <x-button type="submit">{{ __('Save positions') }}</x-button>
                </form>
            </div>
        @else
            <p class="text-red-600">{{ __('admin.Nothing found') }}</p>
        @endif
    </div>
</x-admin-layout>
