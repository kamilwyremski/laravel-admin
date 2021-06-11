<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            {{ __('admin.Blog') }}
        </h2>
        <x-btn-link :href="route('admin_blog_add')">
            {{ __('admin.Add new post') }}
        </x-btn-link>
    </x-slot>

    <div class="p-10">

        @if (count($blogs)>0)
            <x-admin.table :titles="['','admin.Post name','admin.Date','admin.Edit','admin.Remove']">
                @foreach ($blogs as $blog)
                    <tr class="border-b border-gray-100">
                        <td></td>
                        <td class="text-left"><a href="{{route('blog_show',['id'=>$blog->id, 'slug'=>$blog->slug])}}" target="_blank">{{ $blog->name}}</a></td>
                        <td class="text-left">{{ $blog->created_at}}</td>
                        <td class="text-center">
                            <a href="{{ route('admin_blog_edit', $blog) }}">
                                <x-icons.edit width="20" height="20" />
                            </a>
                        </td>
                        <td class="text-center">
                            <form method="POST" onsubmit="return confirm('<?= __('admin.Are you sure?') ?>');" action="{{route('admin_blog_remove',$blog)}}">
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
        {{ $blogs->onEachSide(3)->links()}}
    </div>
</x-admin-layout>
