<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Due Amount Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.provider.duePay', $provider->id) }}" class="ajax-form" method="post" data-name="payment" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" placeholder="Amount" name="amount">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Pay Now</button>
        </div>
    </form>
</div>
