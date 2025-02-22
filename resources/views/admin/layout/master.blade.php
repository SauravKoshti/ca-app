<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
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
    @include('admin.layout.change-theme-color')
</div>
<!-- {{--<div class="wrapper">--}}
{{--    @include('admin.layout.sidebar')--}}
{{--    <div class="main-panel">--}}
{{--        @include('admin.layout.header')--}}
{{--        <div class="content">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--        @include('admin.layout.footer')--}}
{{--    </div>--}}
{{--</div>--}} -->
@include('admin.layout.script')
@yield('section_script')
</body>
</html>
