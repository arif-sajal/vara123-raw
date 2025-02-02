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
                            <div class="card-img-top img-fluid bg-cover height-300" style="background: url('{{ asset('') }}app-assets/images/carousel/22.jpg') 50%;"></div>
                            <div class="media profil-cover-details w-100">
                                <div class="media-left pl-2 pt-2">
                                    <a href="#" class="profile-image">
                                        <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-8.png" class="rounded-circle img-border height-100"
                                             alt="Card image">
                                    </a>
                                </div>
                                <div class="media-body pt-3 px-2">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title">Jose Diaz</h3>
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
            <section id="timeline" class="timeline-center timeline-wrapper">
                <h3 class="page-title text-center">Timeline</h3>
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <li class="timeline-group">
                        <a href="#" class="btn btn-primary"><i class="la la-calendar-o"></i> Today</a>
                    </li>
                </ul>
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <li class="timeline-item">
                        <div class="timeline-badge">
                            <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="la la-plane"></i></span>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <h4 class="card-title"><a href="#">Portfolio project work</a></h4>
                                <p class="card-subtitle text-muted mb-0 pt-1">
                                    <span class="font-small-3">5 hours ago</span>
                                </p>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <img class="img-fluid" src="{{ asset('') }}app-assets/images/portfolio/width-1200/portfolio-1.jpg"
                                     alt="Timeline Image 1">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor
                                            vitae libero hendrerit auctor lacinia a ligula. Curabitur
                                            elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                                        <ul class="list-inline">
                                            <li class="pr-1">
                                                <a href="#" class="">
                                                    <span class="la la-thumbs-o-up"></span> Like</a>
                                            </li>
                                            <li class="pr-1">
                                                <a href="#" class="">
                                                    <span class="la la-commenting-o"></span> Comment</a>
                                            </li>
                                            <li>
                                                <a href="#" class="">
                                                    <span class="la la-share-alt"></span> Share</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer px-0 py-0">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-left mr-1">
                                                <a href="#">
                            <span class="avatar avatar-online">
                              <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-1.png" alt="avatar">
                            </span>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-bold-600 mb-0"><a href="#">Jason Ansley</a></p>
                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                                    metus scelerisque ante sollicitudin commodo.</p>
                                                <ul class="list-inline">
                                                    <li class="pr-1">
                                                        <a href="#" class="">
                                                            <span class="la la-thumbs-o-up"></span> Like</a>
                                                    </li>
                                                    <li class="pr-1">
                                                        <a href="#" class="">
                                                            <span class="la la-commenting-o"></span> Reply</a>
                                                    </li>
                                                </ul>
                                                <div class="media">
                                                    <div class="media-left mr-1">
                                                        <a href="#">
                                <span class="avatar avatar-online">
                                  <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-18.png" alt="avatar">
                                </span>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-bold-600 mb-0"><a href="#">Janice Johnston</a></p>
                                                        <p>Gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                                                        <ul class="list-inline">
                                                            <li class="pr-1">
                                                                <a href="#" class="">
                                                                    <span class="la la-thumbs-o-up"></span> Like</a>
                                                            </li>
                                                            <li class="pr-1">
                                                                <a href="#" class="">
                                                                    <span class="la la-commenting-o"></span> Reply</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control" placeholder="Write comments...">
                                            <div class="form-control-position">
                                                <i class="la la-dashcube"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item mt-3">
                        <div class="timeline-badge">
                <span class="avatar avatar-online" data-toggle="tooltip" data-placement="left" title="Eu pid nunc urna integer">
                  <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-14.png" alt="avatar">
                </span>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <h4 class="card-title"><a href="#">Sofia Orav</a></h4>
                                <p class="card-subtitle text-muted mb-0 pt-1">
                                    <span class="font-small-3">8 hours ago</span>
                                </p>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe src="https://player.vimeo.com/video/118589137?title=0&byline=0"></iframe>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor
                                            vitae libero hendrerit auctor lacinia a ligula. Curabitur
                                            elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                                        <p class="card-text">Eu pid nunc urna integer, sed, cras tortor scelerisque penatibus
                                            facilisis a pulvinar, rhoncus sagittis ut nunc elit! Sociis
                                            in et? Rhoncus, vel dignissim in scelerisque. Dolor lacus
                                            pulvinar adipiscing adipiscing montes! Elementum risus adipiscing
                                            non, cras scelerisque risus penatibus? Massa vut, habitasse,
                                            tincidunt!
                                        </p>
                                        <ul class="list-inline">
                                            <li class="pr-1">
                                                <a href="#" class="">
                                                    <span class="la la-thumbs-o-up"></span> Like</a>
                                            </li>
                                            <li class="pr-1">
                                                <a href="#" class="">
                                                    <span class="la la-commenting-o"></span> Comment</a>
                                            </li>
                                            <li>
                                                <a href="#" class="">
                                                    <span class="la la-share-alt"></span> Share</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer px-0 py-0">
                                    <div class="card-body">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control" placeholder="Write comments...">
                                            <div class="form-control-position">
                                                <i class="la la-dashcube"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item block">
                        <div class="timeline-badge">
                            <a title="" data-context="inverse" data-container="body" class="border-silc" href="#"
                               data-original-title="block highlight"></a>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <div class="text-center">
                                    <p><i class="la la-bar-chart font-medium-4"></i></p>
                                    <h4>Campaign Report</h4>
                                    <p class="timeline-date">18 hours ago</p>
                                    <p>Rhoncus, vel dignissim in scelerisque. Dolor lacus pulvinar adipiscing
                                        adipiscing montes! Elementum risus adipiscing non, cras scelerisque
                                        risus penatibus? Massa vut, habitasse, tincidunt!</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="chart-container">
                                        <div id="stacked-column" class="height-400 overflow-hidden echart-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- 2016 -->
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <li class="timeline-group">
                        <a href="#" class="btn btn-primary"><i class="la la-calendar-o"></i> 2016</a>
                    </li>
                </ul>
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <!-- /.timeline-line -->
                    <li class="timeline-item">
                        <div class="timeline-badge">
                <span class="avatar avatar-online" data-toggle="tooltip" data-placement="right" title="Eu pid nunc urna integer">
                  <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-5.png" alt="avatar">
                </span>
                        </div>
                        <div class="timeline-card card text-white">
                            <img class="card-img img-fluid" src="{{ asset('') }}app-assets/images/portfolio/width-1200/portfolio-2.jpg"
                                 alt="Card image">
                            <div class="card-img-overlay bg-overlay">
                                <h4 class="card-title white">Good Morning</h4>
                                <p class="card-text">
                                    <small>26 Aug, 2016 at 2.00 A.M</small>
                                </p>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                    to additional content. This content is a little bit longer.</p>
                                <p class="card-text">Eu pid nunc urna integer, sed, cras tortor scelerisque penatibus
                                    facilisis a pulvinar, rhoncus sagittis ut nunc elit! Sociis in
                                    et? Rhoncus, vel dignissim in scelerisque. Dolor lacus pulvinar
                                    adipiscing adipiscing montes!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item mt-3">
                        <div class="timeline-badge">
                            <span class="bg-teal bg-lighten-1" data-toggle="tooltip" data-placement="left" title="Nullam facilisis fermentum"><i class="la la-check-square-o"></i></span>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <h4 class="card-title"><a href="#">Sofia Orav</a></h4>
                                <p class="card-subtitle text-muted mb-0 pt-1">
                                    <span class="font-small-3">18 June, 2016 at 4.50 P.M</span>
                                </p>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor
                                            vitae libero hendrerit auctor lacinia a ligula. Curabitur
                                            elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                                        <ul class="list-group icheck-task">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="input-1"> Cras justo odio</li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="input-2" checked> Dapibus ac facilisis in</li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="input-3"> Morbi leo risus</li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="input-4" disabled checked> Porta ac consectetur ac</li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="input-5"> Vestibulum at eros</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer px-0 py-0">
                                    <div class="card-body">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control" placeholder="Write comments...">
                                            <div class="form-control-position">
                                                <i class="la la-dashcube"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-badge">
                <span class="bg-purple bg-lighten-1" data-toggle="tooltip" data-placement="right"
                      title="Nullam facilisis fermentum"><i class="la la-area-chart"></i></span>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <h4 class="card-title"><a href="#">Non-ribbon Chord Chart</a></h4>
                                <p class="card-subtitle text-muted mb-0 pt-1">
                                    <span class="font-small-3">6 Feb, 2016 at 6.00 A.M</span>
                                </p>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor
                                            vitae libero hendrerit auctor lacinia a ligula. Curabitur
                                            elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                                        <div class="chart-container">
                                            <div id="non-ribbon-chord" class="height-400 overflow-hidden echart-container"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer px-0 py-0">
                                    <div class="card-body">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control" placeholder="Write comments...">
                                            <div class="form-control-position">
                                                <i class="la la-dashcube"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- 2015 -->
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <li class="timeline-group">
                        <a href="#" class="btn btn-primary"><i class="la la-calendar-o"></i> 2015</a>
                    </li>
                </ul>
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <!-- /.timeline-line -->
                    <li class="timeline-item block">
                        <div class="timeline-badge">
                            <a title="" data-context="inverse" data-container="body" class="border-silc" href="#"
                               data-original-title="block highlight"></a>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <div class="text-center">
                                    <p class="mt-1"><i class="la la-file-image-o font-medium-4"></i></p>
                                    <h4>Media Gallery</h4>
                                    <p class="timeline-date">July 1, 2015</p>
                                    <p>Eu pid nunc urna integer, sed, cras tortor scelerisque penatibus
                                        facilisis a pulvinar, rhoncus sagittis ut nunc elit! Sociis
                                        in et?</p>
                                </div>
                            </div>
                            <!-- Image grid -->
                            <div class="card-content">
                                <div class="card-body my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                                    <div class="row">
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/1.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/1.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/2.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/2.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/3.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/3.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/4.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/4.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="row">
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/5.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/5.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/6.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/6.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/7.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/7.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/8.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/8.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="row">
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/9.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/9.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/10.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/10.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/11.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/11.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="col-md-3 col-sm-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset('') }}app-assets/images/gallery/12.jpg" itemprop="contentUrl" data-size="480x360">
                                                <img class="img-thumbnail img-fluid" src="{{ asset('') }}app-assets/images/gallery/12.jpg"
                                                     itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                                <!--/ Image grid -->
                                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                    <!-- Background of PhotoSwipe.
                                     It's a separate element as animating opacity is faster than rgba(). -->
                                    <div class="pswp__bg"></div>
                                    <!-- Slides wrapper with overflow:hidden. -->
                                    <div class="pswp__scroll-wrap">
                                        <!-- Container that holds slides.
                                          PhotoSwipe keeps only 3 of them in the DOM to save memory.
                                          Don't modify these 3 pswp__item elements, data is added later on. -->
                                        <div class="pswp__container">
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                        </div>
                                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                        <div class="pswp__ui pswp__ui--hidden">
                                            <div class="pswp__top-bar">
                                                <!--  Controls are self-explanatory. Order can be changed. -->
                                                <div class="pswp__counter"></div>
                                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                                <button class="pswp__button pswp__button--share" title="Share"></button>
                                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                                                <!-- element will get class pswp__preloader-active when preloader is running -->
                                                <div class="pswp__preloader">
                                                    <div class="pswp__preloader__icn">
                                                        <div class="pswp__preloader__cut">
                                                            <div class="pswp__preloader__donut"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                <div class="pswp__share-tooltip"></div>
                                            </div>
                                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                            </button>
                                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                            </button>
                                            <div class="pswp__caption">
                                                <div class="pswp__caption__center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ PhotoSwipe -->
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-badge">
                <span class="bg-warning bg-darken-1" data-toggle="tooltip" data-placement="right"
                      title="Application API Support"><i class="la la-life-ring"></i></span>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left mr-1">
                                        <a href="#">
                        <span class="avatar avatar-md avatar-busy">
                          <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-18.png" alt="avatar">
                        </span>
                                            <i></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title"><a href="#">Application API Support</a></h4>
                                        <p class="card-subtitle text-muted mb-0 pt-1">
                                            <span class="font-small-3">15 Oct, 2015 at 8.00 A.M</span>
                                            <span class="badge badge-pill badge-default badge-warning float-right">High</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <img class="img-fluid" src="{{ asset('') }}app-assets/images/portfolio/width-1200/portfolio-3.jpg"
                                     alt="Timeline Image 1">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">Nullam facilisis fermentum aliquam. Suspendisse ornare dolor
                                            vitae libero hendrerit auctor lacinia a ligula. Curabitur
                                            elit tellus, porta ut orci sed, fermentum bibendum nisi.</p>
                                        <ul class="list-inline">
                                            <li class="pr-1">
                                                <a href="#" class="">
                                                    <span class="la la-commenting-o"></span> Comment</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer px-0 py-0">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-left mr-1">
                                                <a href="#">
                            <span class="avatar avatar-online">
                              <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-4.png" alt="avatar">
                            </span>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-bold-600 mb-0"><a href="#">Crystal Lawson</a></p>
                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                                    metus scelerisque ante sollicitudin commodo.</p>
                                                <div class="media">
                                                    <div class="media-left mr-1">
                                                        <a href="#">
                                <span class="avatar avatar-online">
                                  <img src="{{ asset('') }}app-assets/images/portrait/small/avatar-s-6.png" alt="avatar">
                                </span>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-bold-600 mb-0"><a href="#">Rafila Găitan</a></p>
                                                        <p>Gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control" placeholder="Write comments...">
                                            <div class="form-control-position">
                                                <i class="la la-dashcube"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item mt-3">
                        <div class="timeline-badge">
                            <span class="bg-amber bg-darken-1" data-toggle="tooltip" data-placement="left" title="Quote of the day"><i class="la la-smile-o"></i></span>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <h4 class="card-title"><a href="#">Quote of the day</a></h4>
                                <p class="card-subtitle text-muted mb-0 pt-1">
                                    <span class="font-small-3">03 March, 2015 at 5 P.M</span>
                                </p>
                            </div>
                            <div class="card-content">
                                <img class="img-fluid" src="{{ asset('') }}app-assets/images/portfolio/width-600/portfolio-3.jpg"
                                     alt="Timeline Image 1">
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        <p class="card-text">Eu pid nunc urna integer, sed, cras tortor scelerisque penatibus
                                            facilisis a pulvinar, rhoncus sagittis ut nunc elit! Sociis
                                            in et?</p>
                                        <footer>Someone famous in
                                            <cite title="Source Title"> - Source Title</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- 2014 -->
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <li class="timeline-group">
                        <a href="#" class="btn btn-primary"><i class="la la-calendar-o"></i> 2014</a>
                    </li>
                </ul>
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <!-- /.timeline-line -->
                    <li class="timeline-item block">
                        <div class="timeline-badge">
                            <a title="" data-context="inverse" data-container="body" class="border-silc" href="#"
                               data-original-title="block highlight"></a>
                        </div>
                        <div class="timeline-card card border-grey border-lighten-2">
                            <div class="card-header">
                                <div class="text-center">
                                    <p><i class="la la-map-marker font-medium-4"></i></p>
                                    <h4>Moved to Brooklyn</h4>
                                    <p class="timeline-date">Jan 1, 2014</p>
                                    <p>Eu pid nunc urna integer, sed, cras tortor scelerisque penatibus
                                        facilisis a pulvinar, rhoncus sagittis ut nunc elit! Sociis
                                        in et? Rhoncus, vel dignissim in scelerisque. Dolor lacus pulvinar
                                        adipiscing adipiscing montes! Elementum risus adipiscing non,
                                        cras scelerisque risus penatibus? Massa vut, habitasse, tincidunt!</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="moved-brooklyn" class="height-450"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- 2014 -->
                <ul class="timeline">
                    <li class="timeline-line"></li>
                    <li class="timeline-group">
                        <a href="#" class="btn btn-primary"><i class="la la-calendar-o"></i> Founded in 2012</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
@endsection
@push('page.js')
    <script src="{{ asset('app-assets/js/scripts/charts/echarts/bar-column/stacked-column.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/echarts/radar-chord/non-ribbon-chord.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/gallery/photo-swipe/photoswipe-script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/timeline.js') }}" type="text/javascript"></script>
@endpush
@push('page.vendor.js')
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBDkKetQwosod2SZ7ZGCpxuJdxY3kxo5Po" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/gmaps.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/masonry/masonry.pkgd.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/echarts/echarts.js') }}" type="text/javascript"></script>
@endpush
@push('page.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/timeline.css') }}">
@endpush
