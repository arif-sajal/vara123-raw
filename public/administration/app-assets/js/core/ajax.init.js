$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend:function(xhr){
        if($('.modal-dialog').is(':visible')){
            block($('.modal-dialog'));
        }else{
            block($('.card'));
        }
    },
    complete:function(xhr,status){
        unblock($('.card'));
        unblock($('.modal-dialog'));
    },
});

$(document).on('submit','.ajax-form',function(form){
    form.preventDefault();

    var $this = $(this);
    $this.find(".form-control-position i").removeClass('has-error');
    $this.find(".has-danger").removeClass('has-error');
    $this.find(".form-error").remove();

    var formData = new FormData(this);

    jQuery.ajax({
        type : $this.attr('method'),
        url : $this.attr('action'),
        data : formData,
        success:function(response){
            $('[data-dismiss="modal"]').click()

            notify(response.status,response.message);

            if(response.callback && Array.isArray(response.callback)){
                $.each(response.callback,function(key,value){
                    window[value.function](value.arg);
                });
            }
            if(response.reload){
                $.each(response.reload,function(type,values){
                    reload(type,values);
                });
            }
        },
        error:function(response){
            data = response.responseJSON;
            notify('error',data.message);
            $.each(data.errors,function(key,value){
                $("[name^="+key+"]").parent().addClass('has-danger');
                $("[name^="+key+"]").parent().append('<p class="form-error mb-0"><small class="danger text-muted">'+value[0]+'</small></p>');
            });
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$('[data-table-type="datatable"]').each(function(){
    var name = $(this).data('table-name');
    window[name] = $(this).DataTable(
        window.datatable[$(this).data('table-name')]
    );
});

$('[data-toggle="tab"]').each(function(){
   if($(this).hasClass('active')){
       switchTab($(this).data('href'),$(this).data('content'));
   }
});

/**
* Reload On Click Functionality
* Onclick Reload Function for Reloading table of div elements,
*
* @requires data-action tag with reload Value
* @requires data-type tag with {table} or {div} value
* @requires data-elem tag with element selector value
*
* Author : Ariful Islam Sajal
* Email : sajalarifulislam@gmail.com
* Phone : +8801908088977
**/
$(document).on('click','[data-action="reload"]',function(){
    var $this = $(this);

    var element = $this.data('elem');
    var type = $this.data('type');


    if(type === "table"){
        if($this.data('elem') === "all"){
            $('[data-table-type=datatable]').each(function(key,value){
                window[$(this).data('table-name')].ajax.reload(null,false);
            });
        }

        if(typeof element === 'object'){
            $.each(element,function(key,value){
                window[value].ajax.reload(null,false);
            });
        }else if(element !== 'all'){
            window[element].ajax.reload(null,false);
        }
    }

    if($this.data('type') === "div"){
        if(name === "all"){
            $("[data-identity]").each(function(key,value){
                jQuery($(this)).load($(this).data('source'));
            })
        }
        if(typeof name === 'object'){
            $.each(name,function(key,value){
                var $this = $('[data-identity="' + value.section + '"]');
                jQuery($this).load($this.data('source'));
            });
        }else if(name !== "all"){
            var $this = $('[data-identity="' + name + '"]');
            jQuery($this).load($this.data('source'));
        }
    }
});
/*Reload On Click Functionality Ends*/

$(document).on('click','[data-toggle="modal"]',function(e) {

    var target_modal_element = $(e.currentTarget).data('content');
    var target_modal = $(e.currentTarget).data('target');

    var modal = $(target_modal);
    var modalBody = $(target_modal + ' .modal-content');

    modalBody.load(target_modal_element,function(){
        modal.modal({show:true});
    });
});

$(document).on('click','[data-action="confirm"]',function(e){
    e.preventDefault();
    var $this = $(this);
    if($(this).data('title')){
        var title = $(this).data('title');
    }else{
        var title = 'Want To Delete ?';
    }

    if($(this).data('text')){
        var text = $(this).data('text');
    }else{
        var text = "Are You Sure !!!, You Wont Be Able To Undo...";
    }

    if($(this).data('type')){
        var type = $(this).data('type');
    }else{
        var type = 'warning';
    }

    if($(this).data('confirm-button-text')){
        var conbt = $(this).data('confirm-button-text');
    }else{
        var conbt = 'Yes, Delete it';
    }

    if($(this).data('cancel-button-text')){
        var canbt = $(this).data('cancel-button-text');
    }else{
        var canbt = 'Cancel';
    }

    swal({
        title: title,
        text: text,
        icon: type,
        buttons: {
            cancel: {
                text: canbt,
                value: null,
                visible: true,
                className: "btn-success",
                closeModal: true,
            },
            confirm: {
                text: conbt,
                value: true,
                visible: true,
                className: "btn-danger",
                closeModal: true
            }
        }
    })
    .then((isConfirm) => {
        if (isConfirm) {
            fireAjax($(this).data('action-route'));
        }
    });

});

$(document).on('click','[data-toggle="tab"]', function (e) {
    switchTab($(this).data('href'),$(this).data('content'));
});

$(document).on('click','[data-click="fireAjax"]', function (e) {
    fireAjax($(this).data('url'),$(this).data('type'),$(this).data('data'));
});
