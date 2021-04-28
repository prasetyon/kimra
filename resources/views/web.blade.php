<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{env('APP_NAME').' - '.($title ?? "")}}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="{{env('APP_NAME')}}" name="description" />
        <meta content="" name="keywords" />
        <meta content="" name="author" />
        <!--[if lt IE 9]>
                <script src="{{asset('web/js/html5shiv.js')}}"></script>
            <![endif]-->

        @include('landing/layout.css')
        @livewireStyles
    </head>

    <body>
        <div id="wrapper">
            @include('landing/layout.header')

            <div class="no-bottom no-top" id="content" data-bgcolor="#02347C">
                @yield('content')
            </div>

            @if(!Auth::check())
            @livewire('login-component', ['route' => \Request::route()->getName()])
            @endif

            <div id="preloader">
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
        </div>


        @include('landing/layout.footer')
        @include('landing/layout.js')
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        </script>
        <x-livewire-alert::scripts />
    </body>

</html>
