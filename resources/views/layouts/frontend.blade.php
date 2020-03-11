
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Denis Khomusyak">
    <meta name="generator" content="denisk">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('/img/favicons/apple-touch-icon.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('/img/favicons/favicon-32x32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('/img/favicons/favicon-16x16.png')}}" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="{{asset('/img/favicons/safari-pinned-tab.svg')}}" color="#563d7c">
    <link rel="icon" href="{{asset('/img/favicons/favicon.ico')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    @yield('header')
</head>
<body>

    @include('layouts.include._navbar')

<div class="container" id="app">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-{{session('status')}}" role="alert">
            {{ session('status_message') }}
        </div>
    @endif

    @yield('content')

    @include('layouts.include._footer')
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('footer')
    @stack('scripts')
</body>
</html>