<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Coupon</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.coupon.update', $coupon->id) }}" class="ajax-form" method="post">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" value="{{ $coupon->code }}" name="code">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Discount Type</label>
                        <select name="type" class="form-control">
                            <option value="flat" @if( $coupon->discount_type == 'flat' ) selected @endif >flat</option>
                            <option value="percent" @if( $coupon->discount_type == 'percent' ) selected @endif >percent</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" value="{{ $coupon->amount }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').each(function(){
        $(this).dropify();
    })
</script>
