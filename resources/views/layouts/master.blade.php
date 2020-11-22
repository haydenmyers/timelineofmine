<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        @section('navbar')
            <div class="bg-gray-100 py-4">
                <nav class="container mx-auto px-4 flex justify-between">
                    <a href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <div>
                        @guest
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">{{ __('Logout') }}</a>
                            </form>
                        @endguest
                    </div>
                </nav>
            </div>
        @show

        <main class="bg-gray-100 min-h-full-screen-y">
            @yield('app')
        </main>

    </div>
</body>

</html>
