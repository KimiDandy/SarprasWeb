<script src="{{ asset('/') }}vendor/global/global.min.js"></script>
{{-- <script src="{{ asset('/') }}vendor/chart.js/Chart.bundle.min.js"></script> --}}
<script src="{{ asset('/') }}vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>


<script src="{{ asset('/') }}vendor/toastr/js/toastr.min.js"></script>
<script src="{{ asset('/') }}js/dashboard/dashboard-1.js"></script>
<script src="{{ asset('/') }}vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
{{-- <script src="{{ asset('/') }}js/plugins-init/chartist-init.js"></script> --}}
{{-- <script src="{{ asset('/') }}vendor/owl-carousel/owl.carousel.js"></script> --}}
<script src="{{ asset('/') }}vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('/') }}vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}js/plugins-init/datatables.init.js"></script>
<script src="{{ asset('/') }}js/custom.min.js"></script>
<script src="{{ asset('/') }}js/dlabnav-init.js"></script>
<script src="{{ asset('/') }}js/demo.js"></script>

<script src="{{ asset('/') }}js/styleSwitcher.js"></script>

@if ($errors->any())
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                toastr.error("{{ $errors->first() }}", "Error", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: true,
                    debug: false,
                    newestOnTop: true,
                    progressBar: true,
                    preventDuplicates: true,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: false
                });
            });
        })(jQuery);
    </script>
@endif


</body>

</html>
