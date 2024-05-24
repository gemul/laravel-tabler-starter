{{-- Extends main layout --}}
@extends('layout.adminator')

{{-- Page Title --}}
@section('title')
Dashboard
@endsection

{{-- Optionally add something here to be added to the <head> like css or meta tag --}}
@section('header')
@endsection

{{-- Content Section --}}
@section('content')
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item w-100">
        <div class="row gap-20">
            <!-- #Total Visits ==================== -->
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Total Visits</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- #Total Page Views ==================== -->
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Total Page Views</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash2"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">-7%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- #Unique Visitors ==================== -->
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Unique Visitor</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash3"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- #Bounce Rate ==================== -->
            <div class="col-md-3">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Bounce Rate</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash4"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="masonry-item col-12">
        <!-- #Site Visits ==================== -->
        <div class="bd bgc-white">
            <div class="peers fxw-nw@lg+ ai-s">
                <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                    <div class="layers">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Site Visits</h6>
                        </div>
                        <div class="layer w-100">
                            <div id="world-map-marker"></div>
                        </div>
                    </div>
                </div>
                <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                    <div class="layers">
                        <div class="layer w-100">
                            
                            <div class="layers">
                                <div class="layer w-100">
                                    <h5 class="mB-5">100k</h5>
                                    <small class="fw-600 c-grey-700">Visitors From USA</small>
                                    <span class="pull-right c-grey-600 fsz-sm">50%</span>
                                    <div class="progress mT-10">
                                        <div class="progress-bar bgc-deep-purple-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="visually-hidden">50% Complete</span></div>
                                    </div>
                                </div>
                                <div class="layer w-100 mT-15">
                                    <h5 class="mB-5">1M</h5>
                                    <small class="fw-600 c-grey-700">Visitors From Europe</small>
                                    <span class="pull-right c-grey-600 fsz-sm">80%</span>
                                    <div class="progress mT-10">
                                        <div class="progress-bar bgc-green-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="visually-hidden">80% Complete</span></div>
                                    </div>
                                </div>
                                <div class="layer w-100 mT-15">
                                    <h5 class="mB-5">450k</h5>
                                    <small class="fw-600 c-grey-700">Visitors From Australia</small>
                                    <span class="pull-right c-grey-600 fsz-sm">40%</span>
                                    <div class="progress mT-10">
                                        <div class="progress-bar bgc-light-blue-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="visually-hidden">40% Complete</span></div>
                                    </div>
                                </div>
                                <div class="layer w-100 mT-15">
                                    <h5 class="mB-5">1B</h5>
                                    <small class="fw-600 c-grey-700">Visitors From India</small>
                                    <span class="pull-right c-grey-600 fsz-sm">90%</span>
                                    <div class="progress mT-10">
                                        <div class="progress-bar bgc-blue-grey-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="visually-hidden">90% Complete</span></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="peers pT-20 mT-20 bdT fxw-nw@lg+ jc-sb ta-c gap-10">
                                <div class="peer">
                                    <div class="easy-pie-chart" data-size="80" data-percent="75" data-bar-color="#f44336">
                                        <span></span>
                                    </div>
                                    <h6 class="fsz-sm">New Users</h6>
                                </div>
                                <div class="peer">
                                    <div class="easy-pie-chart" data-size="80" data-percent="50" data-bar-color="#2196f3">
                                        <span></span>
                                    </div>
                                    <h6 class="fsz-sm">New Purchases</h6>
                                </div>
                                <div class="peer">
                                    <div class="easy-pie-chart" data-size="80" data-percent="90" data-bar-color="#ff9800">
                                        <span></span>
                                    </div>
                                    <h6 class="fsz-sm">Bounce Rate</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts here to be added at the bottom of page after </body> --}}
@section('scripts')

@endsection