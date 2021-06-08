<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            {{ __('admin.Users') }}
        </h2>
        <x-btn-link :href="route('admin_user_add')">
            {{ __('admin.Add new user') }}
        </x-btn-link>
    </x-slot>

    <div class="p-10">

        @if (count($users)>0)
            <x-admin.table :titles="['','admin.Name','admin.Email','admin.Date','admin.Edit','admin.Remove']">
                @foreach ($users as $user)
                    <tr class="border-b border-gray-100">
                        <td></td>
                        <td>{{ $user->name}}</td>
                        <td><a href="mailto:{{ $user->email }}">{{ $user->email}}</a></td>
                        <td>{{ $user->created_at}}</td>
                        <td>
                            <a href="{{ route('admin_user_edit', $user) }}">
                                <x-icons.edit width="20" height="20" />
                            </a>
                        </td>
                        <td>
                            @if(Auth::user()->id != $user->id)
                                <form method="POST" onsubmit="return confirm('<?= __('admin.Are you sure?') ?>');" action="{{route('admin_user_remove',$user)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <x-icons.trash width="20" height="20" />
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </x-admin.table>

        @else
            <p class="text-red-600">{{ __('admin.Nothing found') }}</p>
        @endif
    </div>

    <div class="p-10">
        {{ $users->onEachSide(3)->links()}}
    </div>
</x-admin-layout>
