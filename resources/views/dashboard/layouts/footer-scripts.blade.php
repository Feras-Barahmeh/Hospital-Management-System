<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{asset('dashboard/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{asset('dashboard/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{asset('dashboard/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{asset('dashboard/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{asset('dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{asset('dashboard/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{asset('dashboard/plugins/sidebar/sidebar.js')}}"></script>
<script src="{{asset('dashboard/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{asset('dashboard/js/eva-icons.min.js')}}"></script>
@stack('js')
<!-- Sticky js -->
<script src="{{asset('dashboard/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{asset('dashboard/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{asset('dashboard/js/main.js')}}"></script><!-- Left-menu js-->
<script src="{{asset('dashboard/plugins/side-menu/sidemenu.js')}}"></script>

{{-- bootstrap popups --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
{{-- fontaswwom --}}
<script src="{{ asset('dashboard/fontawesome-free/js/all.css') }}" ></script>
@livewireScripts
