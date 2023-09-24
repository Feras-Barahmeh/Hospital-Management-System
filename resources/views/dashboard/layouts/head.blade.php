{{-- Title --}}
<title> @yield('title') </title>

@if(App::getLocale() == 'ar')
    {{--Favicon--}}
    <link rel="icon" href="{{asset('dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    {{--Icons css--}}
    <link href="{{asset('dashboard/css/icons.css')}}" rel="stylesheet">
    {{-- Custom Scroll bar --}}
    <link href="{{asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    {{--Sidebar css--}}
    <link href="{{asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    {{--Sidemenu css--}}
    <link rel="stylesheet" href="{{asset('dashboard/css-rtl/sidemenu.css')}}">
    @yield('css')
    {{--Style css--}}
    <link href="{{asset('dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css-rtl/main.css')}}" rel="stylesheet">
    {{--Dark-mode css--}}
    <link href="{{asset('dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
    {{--Skinmodes css--}}
    <link href="{{asset('dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">
    @stack('css_ar')

@else
    {{-- Favicon --}}
    <link rel="icon" href="{{asset('dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    {{-- Icons css --}}
    <link href="{{asset('dashboard/css/icons.css')}}" rel="stylesheet">
    {{-- Custom Scroll bar --}}
    <link href="{{asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    {{-- Right-sidemenu css --}}
    <link href="{{asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    {{-- Sidemenu css  --}}
    <link rel="stylesheet" href="{{asset('dashboard/css/sidemenu.css')}}">
    {{-- Maps css --}}
    <link href="{{asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    {{-- style css --}}
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/style-dark.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/main.css')}}" rel="stylesheet">
    {{-- Skinmodes css --}}
    <link href="{{asset('dashboard/css/skin-modes.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('dashboard/plugins/owl-carousel/owl.carousel.css')}}">
    <link href="{{asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    @stack('css_en')
@endif
{{-- fontaswwom --}}
<link href="{{ asset('dashboard/fontawesome-free/css/all.css')}}" rel="stylesheet">
@stack('css')
