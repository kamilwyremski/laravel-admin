<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('settings.title'))</title>

    <meta name="Keywords" content="@yield('keywords')">
    <meta name="Description" content="@yield('description')">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
      @include('components.flash-message')
      @include('layouts.navigation')
            
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

    @if(config('services.recaptcha.sitekey'))
      <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
      <script>
          grecaptcha.ready(function () {
              grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', { action: 'homepage' }).then(function (token) {
                  var elms = document.getElementsByClassName('recaptcha')
                  for (var i = 0; i < elms.length; i++) {
                      elms[i].setAttribute("value", token);
                  }
              });
          });
      </script>
    @endif
  </body>
</html>
