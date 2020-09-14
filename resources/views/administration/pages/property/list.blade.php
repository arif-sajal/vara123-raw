@extends('administration.layout')
@section('mainContent')
    <div class="content-wrapper">

        <div class="content-body">
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Properties</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            @each('administration.compo.block.singleProperty',$properties,'property')

                        </div>

                        {{ $properties->onEachSide(2)->links() }}

                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

@push('title')
    Properties
@endpush