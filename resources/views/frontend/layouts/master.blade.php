<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title','Laravel Ecommarce Project')</title>
    @include('frontend.layouts.partials.styles')
</head>

<body>

<div class="wrapper">
    {{--Navigation--}}
    @include('frontend.layouts.partials.navbar')

    @include('frontend.layouts.partials.message')
    {{--End Navigation--}}

    {{--Sidebar + Content--}}

        @yield('content')

    {{--End Sidebar + Content--}}


    @include('frontend.layouts.partials.footer')

</div>





@include('frontend.layouts.partials.script')
@yield('scripts')
</body>
</html>