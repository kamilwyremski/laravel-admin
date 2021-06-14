<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body class="font-sans antialiased">

    @include('components.flash-message')

    <div class="min-h-screen bg-gray-100">
      @include('layouts.navigation')
            
      <div class="flex">
        <nav class="flex-none bg-white shadow p-4 flex flex-col">
          <x-admin.nav-link :href="route('admin')" :active="request()->routeIs('admin')">
              {{ __('admin.Admin Panel') }}
          </x-admin.nav-link>
          <x-admin.nav-link :href="route('admin_static_page_list')" :active="request()->routeIs('admin_static_page_list')">
              {{ __('admin.Static pages') }}
          </x-admin.nav-link>
          <x-admin.nav-link :href="route('admin_blog_list')" :active="request()->routeIs('admin_blog_list')">
              {{ __('admin.Blog') }}
          </x-admin.nav-link>
          <x-admin.nav-link :href="route('admin_user_list')" :active="request()->routeIs('admin_user_list')">
              {{ __('admin.Users') }}
          </x-admin.nav-link>
          <x-admin.nav-link :href="route('admin_settings')" :active="request()->routeIs('admin_settings')">
              {{ __('admin.Settings') }}
          </x-admin.nav-link>
        </nav>
        <div class="flex-1">
          @if(isset($header))
            <!-- Page Heading -->
            <header class="bg-white shadow">
              <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
              </div>
            </header>
          @endif

          <!-- Page Content -->
          <main>
            {{ $slot }}
          </main>
        </div>
      </div>
    </div>
  </body>
</html>
