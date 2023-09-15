@push('css')
    {{-- Internal  Owl Carousel css --}}
    <link href="{{ asset('dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    {{-- Internal Sweet-Alert css --}}
    <link href="{{ asset('dashboard/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endpush


@if(session()->has('success-popup'))
    <script>
        let data = @json(session('success-popup'));
        window.onload = function () {
            swal({
                title: data['title'],
                text: data['text'],
                type: 'success',
                confirmButtonColor: data['confirmButtonColor'] ?? '#57a94f',
            });
        };
    </script>
@endif

@if(session()->has('fail-popup'))

    <script>
        let data = @json(session('fail-popup'));
        window.onload = function () {
            swal({
                title: data['title'],
                text: data['text'],
                type: 'error',
                confirmButtonColor: data['confirmButtonColor'] ?? '#57a94f',
            });
        };
    </script>
@endif

@push('js')
    {{-- Internal  Datepicker js --}}
    <script src="{{ asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    {{-- Internal Select2 js --}}
    <script src="{{ asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/rating/ratings.js')}}"></script>
    {{-- Internal  Sweet-Alert js --}}
    <script src="{{ asset('dashboard/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
    {{-- Sweet-alert js --}}
    <script src="{{ asset('dashboard/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('dashboard/js/sweet-alert.js')}}"></script>
@endpush
