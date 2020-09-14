<div class="modal-header">
    <h5 class="modal-title">Add Room</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('app.form.submission.property.room.add',$property->id) }}" method="POST">
    <div class="modal-body">

        <div class="form-group">
            <label class="form-label">Room Type<span class="text-danger">*</span></label>
            <select name="room_type" class="form-control">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Queen">Queen</option>
                <option value="King">King</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Description<span class="text-danger">*</span></label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Total Room<span class="text-danger">*</span></label>
            <input class="form-control" name="total" type="text" placeholder="Total Room"/>
        </div>

        <div class="form-group bed-repeater">

            <label class="form-label">Beds<span class="text-danger">*</span></label>

            <div data-repeater-list="beds">
                <div data-repeater-item class="mb-2">
                    <div class="row bed-repeater">
                        <div class="col-md-6">
                            <select name="beds[][bed_type][]" class="form-control">
                                <option value="Single" selected>Single</option>
                                <option value="Double">Double</option>
                                <option value="Queen">Queen</option>
                                <option value="King">King</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="form-control" name="beds[][for_person][]" type="text" placeholder="For Person" id="for_person"/>
                                <span class="input-group-append" id="button-addon2">
                                  <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type='button' data-repeater-create class="btn btn-primary">
                <i class="ft-plus"></i> Add Bed
            </button>

        </div>


        <div class="form-group">

            <label class="form-label">Billings<span class="text-danger">*</span></label>

            @foreach(\App\Models\BillingType::all() as $billing)
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $billing->type }}" disabled>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Price Per {{ $billing->per }}" name="price[{{ $billing->id }}]">
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ $property->provider->currency->symbol }}</span>
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
