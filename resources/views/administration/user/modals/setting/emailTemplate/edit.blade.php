<div class="modal-header">
    <h5 class="modal-title">Edit Email Template</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.update.email.template',$template->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Subject<span class="text-danger">*</span></label>
            <input class="form-control" name="subject" type="text" placeholder="Subject" value="{{ $template->subject }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Email Body</label>
            <textarea class="form-control" id="ckeditor" name="body" type="text" placeholder="Email Body">{!! $template->body !!}</textarea>
            <div class="btn-group mt-1">
                @foreach($template->tags as $tag)
                    <button class="btn btn-sm btn-success" type="button" data-action="push"> {{ "{".$tag."}" }} </button>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Save Template</button>
    </div>
</form>
<script>
    var editor = CKEDITOR.instances['ckeditor'];
    if (editor) { editor.destroy(true); }
    CKEDITOR.replace( 'ckeditor', {
        extraPlugins: 'language',
        // Customizing list of languages available in the Language drop-down.
        language_list: [ 'ar:Arabic:rtl', 'fr:French',  'he:Hebrew:rtl', 'es:Spanish' ],
        height: 350
    } );

    $("[data-action=\"push\"]").on('click', function() {
        CKEDITOR.instances['ckeditor'].insertText($(this).html());
    });

</script>
