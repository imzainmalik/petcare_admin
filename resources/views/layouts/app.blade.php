<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('include.styles');

    <!-- Scripts -->
</head>

<body>
    @if (Auth::user()->acc_type = 1)
        @include('include.admin-sidenav')
    @elseif (Auth::user()->acc_type = 2)
        @include('include.sitter-sidenav')
    @elseif (Auth::user()->acc_type = 0)
        @include('include.user-sidenav')
    @endif


    <div class="main-content" id="panel">
        @include('include.top-nav')


        <main class="py-4">
            @yield('content')
        </main>
    </div>


    @include('include.javascript')
    @include('include.alerts')
    @stack('custom_js')
</body>

</html>
