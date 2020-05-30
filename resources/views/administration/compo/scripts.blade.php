<!-- BEGIN VENDOR JS-->
<script src="{{ asset('administration/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('administration/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
@stack('page.vendor.js')
<!-- END PAGE VENDOR JS-->

<!-- BEGIN MODERN JS-->
<script src="{{ asset('administration/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/js/core/ajax.functions.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->

<!-- BEGIN PAGE LEVEL JS-->
@stack('page.js')
<!-- END PAGE LEVEL JS-->

<script src="{{ asset('administration/app-assets/js/core/ajax.init.js') }}" type="text/javascript"></script>
