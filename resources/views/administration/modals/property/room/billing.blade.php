<div class="modal-header">
    <h5 class="modal-title">Add Room Billing</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('admin.form.submission.property.room.add',$room->id) }}" method="POST">
    <div class="modal-body">

        <div class="form-group">

            <label class="form-label">Billings<span class="text-danger">*</span></label>

            @foreach($room->billings as $bill)
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $bill->billing_type->type }}" disabled>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Price Per {{ $bill->per }}" name="price[{{ $bill->id }}]" value="{{ $bill->amount }}"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ $room->provider->currency->symbol }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>

<script src="{{ asset('administration/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

<script>
    $('.bed-repeater').repeater();
</script>
