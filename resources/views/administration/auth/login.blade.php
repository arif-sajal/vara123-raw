<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Login</title>

    <link rel="apple-touch-icon" href="{{ asset('administration/') }}app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('administration/') }}app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/assets/css/style.css') }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu" data-col="1-column" style="background: url({{ asset('administration/app-assets/images/backgrounds/background.jpg') }}) no-repeat center center fixed;">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0 login-form-block">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <img src="{{ asset('administration/app-assets/images/logo/logo-dark.png') }}" alt="branding logo">
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                    <span>Login Using Account Details</span>
                                </p>
                                <div class="card-body">
                                    <div class="form-message" style="display: none;"></div>
                                    <form class="form-horizontal login-form" action="{{ route('login.do') }}" method="POST">
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" name="username" placeholder="Your Username">
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-sm-left">
                                                <fieldset>
                                                    <input type="checkbox" name="remember" class="chk-remember" value="1">
                                                    <label for="remember-me"> Remember Me</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                                                <a href="javascript:void(0);" class="card-link">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-block">
                                            <i class="ft-unlock"></i> Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('administration/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('administration/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('administration/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('administration/app-assets/js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script>
    $('.login-form').submit(function(e){
        e.preventDefault();
        $('.login-form-block').block({
            message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'transparent'
            }
        });

        $(".login-form .form-control-position i").removeClass('has-error');
        $(".login-form .has-danger").removeClass('has-error');
        $(".login-form .form-error").remove();
        $(".form-message").hide();

        var $this = $(this);
        var formData = new FormData(this);
        jQuery.ajax({
            type: $this.attr('method'),
            url: $this.attr('action'),
            data: formData,
            success:function(response){
                if(response.status === "success"){
                    $(".form-message").html('<div class="alert bg-success alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+response.message+'</div>');
                }else if(response.status === "error"){
                    $(".form-message").html('<div class="alert bg-danger alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+response.message+'</div>');
                }
                $('.form-message').slideDown('fast');
                if(response.callback && Array.isArray(response.callback)){
                    $.each(response.callback,function(key,value){
                        window[value.function](value.arg);
                    });
                }
            },
            error:function(response){
                data = response.responseJSON;
                $.each(data.errors,function(key,value){
                    $("[name^="+key+"]").parent().addClass('has-danger');
                    $("[name^="+key+"]").parent().append('<p class="text-right form-error mb-0"><small class="danger text-muted">'+value[0]+'</small></p>');
                    $("[name^="+key+"]").parent().find('.form-control-position i').addClass('danger');
                });
                if(data.message){
                    $(".form-message").html('<div class="alert bg-danger alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data.message+'</div>');
                    $('.form-message').slideDown('fast');
                }
                $('.login-form-block').unblock();
            },
            complete:function(){
                $('.login-form-block').unblock();
            },
            cache: false,
            contentType: false,
            processData: false
        });

    });

    $('input').keypress(function(){
        $(this).parent().removeClass('has-danger');
        $(this).parent().find('.form-error').remove();
        $(this).parent().find('.form-control-position i').removeClass('danger');
    });

    function redirect(url){
        window.location = url;
    }
</script>
</body>
</html>
