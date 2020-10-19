<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Booking Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.booking.confirm', $booking->id) }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Due amount</label>
                        <input type="text" readonly value="{{ $due_amount }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <label>Payment Method</label>
                    <select name="payment_type" class="form-control">
                         <option value="1">Card</option>
                         <option value="2">Mobile Banking</option>
                         <option value="3">Cash on Delivery</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Confirm</button>
        </div>
    </form>
</div>
