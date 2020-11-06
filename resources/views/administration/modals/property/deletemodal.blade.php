<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Are you sure want to delete this property</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <form action="{{ route('app.property.delete', $property->id ) }}" class="ajax-form" method="post" >
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-outline-primary">Yes</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').each(function(){
        $(this).dropify();
    })
</script>
