<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/favicon.ico')}}" />

        <title>{{env('APP_NAME').' - '.$title}}</title>

        @include('admin/layout.css')
        @livewireStyles
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('admin/layout.nav')
            @include('admin/layout.sidebar')

            <div class="content-wrapper">
                @include('admin/layout.header')
                <div class="content">
                    @include('admin/layout.alert')
                    @yield('content')
                </div>
                <div wire:loading>Processing...</div>
            </div>
            @include('admin/layout.footer')
        </div>

        @include('admin/layout.js')
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        </script>
        <x-livewire-alert::scripts />
    </body>
</html>
