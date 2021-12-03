<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="ad1080, bodas, video,fotografia">
        <meta name="autor" content="Adrián Sánchez Millán">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '') }}</title>

        <link rel="shortcut icon" type="image/png" href="{{ asset('/img/favicon.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS -->
        <link href="{{asset('css/all.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/mis_estilos.css')}}">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

   

        @livewireStyles

        <!-- Scripts -->
        @stack('head')
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
        
        
    </head>
    <body onload="" class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-blue-200 imagen-fondo" style="height: auto;background-image:url('{{ asset('img/fondo2.png') }}');background-size: cover;">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gray-500">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="min-h-screen">
                {{ $slot }}
            </main>
            <footer class="max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-blue-100">
                <div class="text-center flex justify-center items-center">
                    <div class="flex-row py-2 px-4">
                        <p class="text-base">Todos los derechos reservados, Copyright &#169; 2021</p> <p class="text-xl">Creado por Adrián Sánchez Millán</p>
                    </div>
                    <a href="https://www.linkedin.com/in/adriansanchezmillan/" title="Perfil de Adrián Sánchez Millán">
                    <div class="w-28">
                        <img src="{{ asset('img/qr-code_AdrianSanchezMillan.png') }}" alt="QR-Adrian Sanchez Millan">
                    </div>
                    </a>
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
