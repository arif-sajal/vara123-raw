<div class="card-header p-0">
    <ul class="nav nav-tabs nav-underline no-hover-bg">
        @foreach ($tabs as $tab)
            <li class="nav-item" data-tab-url="{{ route('user.settings',['tab1'=>request()->tab1,'tab2'=>$tab]) }}">
                <a class="nav-link @if((request()->has('tab2') && request()->tab2 == $tab) || (!request()->has('tab2') && $loop->index == 0)) active @endif" data-toggle="tab" data-href="#tabViewOne" data-content="{{ route('user.tab.setting.status.tab',$tab) }}" aria-controls="active" aria-expanded="true">{{ ucfirst($tab) }}</a>
            </li>
        @endforeach
    </ul>
</div>
<div class="card-content">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tabViewOne" aria-labelledby="active-tab" aria-expanded="true"></div>
    </div>
</div>

<script>
    $('[data-href="#tabViewOne"]').each(function(){
        if($(this).hasClass('active')){
            switchTab($(this).data('href'),$(this).data('content'));
        }
    });
</script>
