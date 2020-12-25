<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @livewire('admin-navigation')

    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-2">
            <x-admin-sidebar></x-admin-sidebar>
        </div>
        <div class="col-span-4">
            @if(session('message'))
                {{--                <x-flash-success :message="session('message')" />--}}
            @endif

            @if($errors->count() > 0)
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        {{--                        <li><x-flash-error :message="$error" /></li>--}}
                    @endforeach
                </ul>
        @endif

        <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @if(session('message'))
                    <x-flash-success :message="session('message')"></x-flash-success>
                @endif
                @if($errors->count()>0)
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>
                                <x-flash-error :message="$error"></x-flash-error>
                            </li>
                        @endforeach
                    </ul>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>


</div>

@stack('modals')

@livewireScripts
</body>
</html>
