<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('administration.compo.head')

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- fixed-top-->
@include('administration.compo.topMenu')

<!-- ////////////////////////////////////////////////////////////////////////////-->

@include('administration.compo.mainMenu')

<div class="app-content content">
    @yield('mainContent')
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('administration.compo.footer')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZDni5W-iV-mDZmL44FwTFqhWbv7YgMGI&callback=initMap"></script>

<!-- MY MODAL Extra LARGE -->
<div class="modal fade modal-size-large" id="myModalExtraLarge" role="dialog" aria-labelledby="modal-default-header">
    <div class="modal-dialog modal-xl" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- MY MODAL Extra LARGE END -->

<!-- MY MODAL LARGE -->
<div class="modal fade modal-size-large" id="myModalLarge" role="dialog" aria-labelledby="modal-default-header">
    <div class="modal-dialog modal-lg" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- MY MODAL LARGE END -->

<!-- MY MODAL -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="modal-default-header">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- MY MODAL LARGE END -->

<!-- MY MODAL SMALL -->
<div class="modal fade modal-size-small" id="myModalSmall" role="dialog" aria-labelledby="modal-default-header">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- MY MODAL SMALL END -->
</body>
</html>
