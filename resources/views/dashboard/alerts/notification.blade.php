@push('css')
    {{-- notification --}}
    <!--Internal  Font Awesome -->
    <link href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    {{-- Internal   Notify  --}}
    <link href="{{ asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    {{-- Internal  treeview --}}
    <link href="{{ asset('dashboard/plugins/treeview/treeview.css')}}" rel="stylesheet" type="text/css" />
@endpush

@if(session()->has('success-notification'))
    <script>
        let data = @json(session('success-notification'));
        window.onload = function () {
            notif({
                msg: `<b>${data['type']}:</b> ` + data['message'] ,
                type: "success"
            });
        }
    </script>
@endif

@if(session()->has('fail-notification'))
    <script>
        let data = @json(session('fail-notification'));
        window.onload = function () {
            notif({
                msg: `<b>${data['type']}:</b> ` + data['message'] ,
                type: "error"
            });
        }
    </script>
@endif

@push('js')
    {{-- notification --}}
    {{-- Internal Treeview js --}}
    <script src="{{ asset('dashboard/plugins/treeview/treeview.js')}}"></script>
    {{-- Internal  Notify js --}}
    <script src="{{ asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endpush
