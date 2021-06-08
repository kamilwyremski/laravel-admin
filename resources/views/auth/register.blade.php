<x-app-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <input type="hidden" name="recaptcha" class="recaptcha">

      <!-- Name -->
      <div>
        <x-label for="name" :value="__('messages.Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('messages.Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('messages.Password')" />

        <x-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('messages.Confirm Password')" />

        <x-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
          {{ __('messages.Already registered?') }}
        </a>

        <x-button class="ml-4">
          {{ __('messages.Register') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-app-layout>
