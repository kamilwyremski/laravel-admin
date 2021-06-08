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
            <x-admin.table :titles="['','admin.Page name','admin.Date','admin.Edit','admin.Remove']">
                @foreach ($static_pages as $static_page)
                    <tr class="border-b border-gray-100">
                        <td></td>
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

        @else
            <p class="text-red-600">{{ __('admin.Nothing found') }}</p>
        @endif
    </div>

    <div class="p-10">
        {{ $static_pages->onEachSide(3)->links()}}
    </div>
</x-admin-layout>
