@extends('user.layout')
@section('mainContent')
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="card profile-with-cover">
                        <div class="card-img-top img-fluid bg-cover height-300" style="background: url('../../../app-assets/images/carousel/22.jpg') 50%;"></div>
                        <div class="media profil-cover-details w-100">
                            <div class="media-left pl-2 pt-2">
                                <a href="#" class="profile-image">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-8.png" class="rounded-circle img-border height-100"
                                         alt="Card image">
                                </a>
                            </div>
                            <div class="media-body pt-3 px-2">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title m-0">{{ $user->profile->full_name }}</h3>
                                        @if($user->banned)
                                            <p class="text-danger">{{ $user->ban_reason }}</p>
                                        @endif
                                    </div>
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-primary d-"><i class="la la-plus"></i> Follow</button>
                                        <div class="btn-group d-none d-md-block float-right ml-2" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success"><i class="la la-dashcube"></i> Message</button>
                                            <button type="button" class="btn btn-success"><i class="la la-cog"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav class="navbar navbar-light navbar-profile align-self-end">
                            <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false"
                                    aria-label="Toggle navigation"></button>
                            <nav class="navbar navbar-expand-lg">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#"><i class="la la-line-chart"></i> Timeline <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="la la-user"></i> Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="la la-briefcase"></i> Projects</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="la la-heart-o"></i> Favourites</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="la la-bell-o"></i> Notifications</a>
                                        </li>
                                    </ul>
                                </div>
                    </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="heading-buttons1">Personal Information</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-sm btn-primary">Click</button>
                            <button type="button" class="btn btn-sm bg-blue-grey white"><i class="ft-settings white"></i> Click</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <table class="table">
                            <tr>
                                <td>Full Name</td>
                                <td>{{ $user->profile->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Father Name</td>
                                <td>{{ $user->profile->father_name ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <td>Mother Name</td>
                                <td>{{ $user->mother_name ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <td>Date Of Borth</td>
                                <td>{{ $user->profile->date_of_birth ? $user->profile->date_of_birth->format('d M, Y') :  "N/A" }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $user->profile->gender ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <td>Marital Status</td>
                                <td>{{ $user->profile->marital_status ?? "N/A" }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="heading-buttons1">Contact Information</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-sm btn-primary">Click</button>
                            <button type="button" class="btn btn-sm bg-blue-grey white"><i class="ft-settings white"></i> Click</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <table class="table">
                            <tr>
                                <td>Phone</td>
                                <td>{{ $user->profile->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td>{{ $user->profile->mobile ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <td>Skype</td>
                                <td>{{ $user->profile->skype ?? "N/A" }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="heading-buttons1">Professional Information</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-sm btn-primary">Click</button>
                            <button type="button" class="btn btn-sm bg-blue-grey white"><i class="ft-settings white"></i> Click</button>
                        </div>
                    </div>
                    <div class="card-content">
                        <table class="table">
                            @if($user->profile->employment_id)
                                <tr>
                                    <td>Employment ID</td>
                                    <td>{{ $user->profile->employment_id }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Date Of Joining</td>
                                <td>{{ $user->profile->date_of_joining ? $user->profile->date_of_joining->format('d M, Y') : "N/A" }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-0">
                        <ul class="nav nav-tabs nav-underline no-hover-bg">
                            <li class="nav-item">
                                <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="link-tab" data-toggle="tab" href="#link" aria-controls="link" aria-expanded="false">Bank Accounts</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </a>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" id="dropdownOpt1-tab" href="#dropdownOpt1" data-toggle="tab" aria-controls="dropdownOpt1" aria-expanded="true">dropdown 1</a>
                                    <a class="dropdown-item" id="dropdownOpt2-tab" href="#dropdownOpt2" data-toggle="tab" aria-controls="dropdownOpt2" aria-expanded="true">dropdown 2</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="linkOpt-tab" data-toggle="tab" href="#linkOpt" aria-controls="linkOpt">Another Link</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="tab-content px-1 pt-1">
                            <div role="tabpanel" class="tab-pane active" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                <p>Macaroon candy canes tootsie roll wafer lemon drops liquorice
                                    jelly-o tootsie roll cake. Marzipan liquorice soufflé cotton
                                    candy jelly cake jelly-o sugar plum marshmallow. Dessert
                                    cotton candy macaroon chocolate sugar plum cake donut.</p>
                            </div>
                            <div class="tab-pane" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                <p>Chocolate bar gummies sesame snaps. Liquorice cake sesame
                                    snaps cotton candy cake sweet brownie. Cotton candy candy
                                    canes brownie. Biscuit pudding sesame snaps pudding pudding
                                    sesame snaps biscuit tiramisu.</p>
                            </div>
                            <div class="tab-pane" id="dropdownOpt1" role="tabpanel" aria-labelledby="dropdownOpt1-tab" aria-expanded="false">
                                <p>Fruitcake marshmallow donut wafer pastry chocolate topping
                                    cake. Powder powder gummi bears jelly beans. Gingerbread
                                    cake chocolate lollipop. Jelly oat cake pastry marshmallow
                                    sesame snaps.</p>
                            </div>
                            <div class="tab-pane" id="dropdownOpt2" role="tabpanel" aria-labelledby="dropdownOpt2-tab" aria-expanded="false">
                                <p>Soufflé cake gingerbread apple pie sweet roll pudding. Sweet
                                    roll dragée topping cotton candy cake jelly beans. Pie
                                    lemon drops sweet pastry candy canes chocolate cake bear
                                    claw cotton candy wafer.</p>
                            </div>
                            <div class="tab-pane" id="linkOpt" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                <p>Cookie icing tootsie roll cupcake jelly-o sesame snaps. Gummies
                                    cookie dragée cake jelly marzipan donut pie macaroon. Gingerbread
                                    powder chocolate cake icing. Cheesecake gummi bears ice
                                    cream marzipan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
@endpush
