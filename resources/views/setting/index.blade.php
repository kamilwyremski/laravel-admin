<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Settings') }}
        </h2>
    </x-slot>

    @section('title', __('messages.Settings'))

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex">
                        <div class="flex-initial">
                            <form method="POST">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <p class="text-red-600">{{ $error }}</p>
                                @endforeach 

                                <x-label for="current_password" :value="__('messages.Old password')" />
                                <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required autofocus />
                                <div class="mt-4">
                                    <x-label for="new_password" :value="__('messages.Password')" />
                                    <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" required />
                                </div>
                                <div class="mt-4">
                                    <x-label for="new_confirm_password" :value="__('messages.Confirm Password')" />
                                    <x-input id="new_confirm_password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="new_confirm_password" required />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-button>
                                        {{ __('messages.Save') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
