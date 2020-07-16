<div class="modal-header">
    <h5 class="modal-title">Room View</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body p-0">

    <table class="table table-bordered table-responsive-lg">
        <tbody>
            <tr>
                <td>Room Type</td>
                <td>{{ $room->room_type }}</td>
            </tr>
            <tr>
                <td>Total Room</td>
                <td>{{ $room->total }}</td>
            </tr>
            <tr>
                <td>Available Room</td>
                <td>{{ $room->available }}</td>
            </tr>
            <tr>
                <td>Already Booked Room</td>
                <td>{{ $room->booked }}</td>
            </tr>
            <tr>
                <td>Total Beds</td>
                <td>{{ $room->bed_count }}</td>
            </tr>
        </tbody>
    </table>

    <p class="px-1 mb-2"><strong>Description : </strong> {{ $room->description }}</p>

    <p class="px-1"><strong>Beds</strong></p>

    <table class="table table-bordered table-responsive-lg mb-2">
        <tbody>
            @foreach($room->beds as $bed)
                <tr>
                    <td>{{ $bed->size }}</td>
                    <td>{{ $bed->for_person }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="px-1"><strong>Billings</strong></p>

    <table class="table table-bordered table-responsive-lg">
        <tbody>
            @foreach($room->billings as $bill)
                <tr>
                    <td>{{ $bill->billing_type->type }}</td>
                    <td>{{ $bill->amount }} {{ $bill->currency->symbol }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<div class="modal-footer">
    <button type="button" class="btn" data-dismiss="modal">Close</button>
</div>
