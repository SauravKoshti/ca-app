<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layout.css')
</head>

<body>
    <div class="wrapper">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            @include('admin.layout.header')
            <div class="container">
                @yield('content')
            </div>
            @include('admin.layout.footer')
        </div>
    </div>
    @include('admin.layout.script')
    @yield('section_script')
</body>

</html>