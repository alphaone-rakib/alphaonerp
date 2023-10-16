<script src="{{ URL::asset('assets/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ URL::asset('assets/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ URL::asset('assets/flatpickr/flatpickr.js') }}"></script>
<script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/toastr/toastr.min.js') }}"></script>

<script>
    @if(Session::has('demo_error'))
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.error('{{ Session::get('demo_error') }}')
    @endif

    @if(Session::has('info'))
        toastr.success('{{ Session::get('info') }}')
    @endif

    @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}')
    @endif

    @if(Session::has('warning'))
        toastr.success('{{ Session::get('warning') }}')
    @endif

    @if(Session::has('error'))
        toastr.error('{{ Session::get('error') }}')
    @endif

    @if(isset($errors)&&count($errors) > 0)
        @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}')
        @endforeach
    @endif

</script>

@yield('script')
@yield('script-bottom')
