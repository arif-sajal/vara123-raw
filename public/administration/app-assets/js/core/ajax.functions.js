function fireAjax(url,type='get',data={}){
    jQuery.ajax({
        type: type,
        url: url,
        data: data,
        success: function(response){

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
        error: function(response){
            var data = response;
            if(data.message){
                notify(null,data.message);
            }else{
                notify(null,"Something Going Wrong, Contact Administration");
            }
        },
    });
}

function block(element){
    element.closest('.card').block({
        message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
        timeout: 2000, //unblock after 2 seconds
        overlayCSS: {
            backgroundColor: '#FFF',
            cursor: 'wait',
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'none'
        }
    });
}

function unblock(element){
    element.closest('.card').unblock();
}

function notify(status=null,message=null,title=null){
    var setting = {
        positionClass: 'toast-bottom-right',
        containerId: 'toast-bottom-right',
        progressBar: true,
    };
    if(status == 'success'){
        toastr.success(message,title,setting).css({'white-space':'nowrap','width':'auto'});
    }else if(status == "warning"){
        toastr.warning(message,title,setting).css({'white-space':'nowrap','width':'auto'});
    }else if(status == "error"){
        toastr.error(message,title,setting).css({'white-space':'nowrap','width':'auto'});
    }else{
        toastr.error(message,title,setting).css({'white-space':'nowrap','width':'auto'});
    }
}

function reload(type,name){
    if(type === "table"){
        if(name === "all"){
            $('[data-table-type=datatable]').each(function(key,value){
                window[$(this).data('name')].ajax.reload(null,false);
            });
        }
        if(typeof name === 'object'){
            $.each(name,function(key,value){
                window[value.section].ajax.reload(null,false);
            });
        }else if(name !== 'all'){
            window[name].ajax.reload(null,false);
        }
    }

    if(type === "div"){
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
}

function switchTab(tab,url=null){
    var $tab = $('[data-content="'+url+'"]');
    if($tab.length < 1){
        var $tab = $('[data-href="'+url+'"]');
    }
    var $tabView = $(tab);
    var $activeTab = $tab.closest('.nav-link.active');
    var $activeTabView = $(tab+'.tab-pane.active');

    $activeTab.removeClass('active');
    $activeTabView.removeClass('active').html("");
    $tab.addClass('active');

    changeUrl($tab.parent('li').data('tab-url'));

    if(url){
        $tabView.addClass('active').load(url);
    }else{
        $tabView.addClass('active');
    }
}

function redirect(url){
    window.location = url;
}

function initiateDatatable(tableName){
    if(!window.hasOwnProperty('datatable')){
        window.datatable = [];
    }
    var $this = $('[data-table-name="'+tableName+'"]');
    window.datatable[tableName] = {
        serverSide: true,
        ajax: {
            url: $this.data('table-content'),
            method: "POST",
        },
        destroy:true,
        drawCallback: function(){
            $("[data-action='changeStatus']").bootstrapSwitch({
                size: 'small',
                onSwitchChange: function(event, state){
                    fireAjax($(this).data('action-route'));
                },
            });
            $("[data-hover='tooltip']").tooltip();
            $(document).on('mouseenter', '[data-hover="popover"]' ,function() {
                $(this).popover('show');
            });
            $(document).on('mouseout', '[data-hover="popover"]' ,function() {
                $(this).popover('hide');
            });
        }
    };
}

function assignDatatable(tableName){
    window[tableName] = $('[data-table-name="'+tableName+'"]').DataTable(
        window.datatable[tableName]
    );
}

$('[data-table-type="datatable"]').each(function(){
    var name = $(this).data('table-name');
    initiateDatatable(name);
});

function changeUrl(urlPath){
    window.history.pushState({"pageTitle":'something'},"", urlPath);
}
