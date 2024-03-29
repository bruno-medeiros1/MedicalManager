<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<header class="row">
    @include('includes.header')
</header>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                @include('includes.sidemenu')
            </div>
            <div class="col-10">
                <div class="row p-0">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>
