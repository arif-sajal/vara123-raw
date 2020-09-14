<div class="modal-header">
    <h5 class="modal-title">Email Template : {{ $template->title }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.department.add') }}" method="POST">
    <div class="modal-body">
        <p><strong>Subject : </strong>{{ $template->subject }}</p>
        <div class="border-success p-2">
            {!! $template->body !!}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
    </div>
</form>
