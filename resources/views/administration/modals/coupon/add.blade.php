<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add Coupon</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.coupon.add') }}" class="ajax-form" method="post">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" name="code">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Discount Type</label>
                        <select name="type" class="form-control">
                            <option value="1">flat</option>
                            <option value="2">percent</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Add</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').each(function(){
        $(this).dropify();
    })
</script>
