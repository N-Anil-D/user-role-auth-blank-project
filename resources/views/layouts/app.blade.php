<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name') }} - @yield('page-title')</title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

      <!-- Scripts -->
      {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

      <!-- Styles -->
      @livewireStyles
      @include('statick-load-page.header')
      @yield('css')
    </head>
    <body>
        <section class="body">
            {{-- @include('top-bar') --}}
            <livewire:top-bar />

            <div class="inner-wrapper">
                {{-- @include('left-side-bar') --}}
                <livewire:left-navigation-bar />
                <section role="main" class="content-body">
                    
                    <header class="page-header">
                        @yield('title')
                    </header>

                    <main>
                        {{ $slot }}
                    </main>
                </section>
            </div>
        </section>

        {{-- @stack('modals') --}}
		@include('statick-load-page.js-loader')
        @livewireScripts
		@stack('js')
		@yield('js')
    </body>
</html>
