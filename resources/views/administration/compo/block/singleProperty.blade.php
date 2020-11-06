<div class="col-xl-4 col-md-6 col-sm-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title">{{ $property->name }}</h4>
                <h6 class="card-subtitle text-muted">{{ \Illuminate\Support\Str::limit($property->address,35)  }}</h6>
            </div>

            @if(\Illuminate\Support\Facades\Storage::has($property->featured_image))
                <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($property->featured_image) }}" alt="Card image cap">
            @else
                <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($property->property_type->property_featured_image_not_found) }}" alt="Card image cap">
            @endif

            <div class="card-body">
                <p class="card-text"><strong>Property Type : </strong>{{ $property->property_type->name }}</p>
                <p class="card-text"><strong>Description : </strong>{{ \Illuminate\Support\Str::limit($property->description,90) }}</p>
            </div>

            <div class="btn-group btn-block" role="group" aria-label="Basic example">
                <a href="{{ route('app.property.view',$property->id) }}" type="button" class="btn btn-success w-100">
                    <i class="la la-eye"></i>
                </a>
                <a href="{{ route('app.property.edit',$property->id) }}" class="btn btn-primary w-100">
                    <i class="la la-pencil"></i>
                </a>
                <button class="btn btn-danger w-100 style="margin-top:15px" data-toggle="modal" data-target="#myModal" data-content="{{ route('app.property.delete.modal', $property->id) }}">
                    <i class="la la-trash-o"></i>
                </button>
            </div>

        </div>
    </div>
</div>
