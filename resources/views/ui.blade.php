{{-- Extends main layout --}}
@extends('layout.adminator')

{{-- Page Title --}}
@section('title')
App
@endsection

{{-- Optionally add something here to be added to the <head> like css or meta tag --}}
@section('header')
@endsection

{{-- Content Section --}}
@section('content')
<div class="row gap-20 masonry pos-r">
    <h4 class="c-grey-900">UI Elements</h4>
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Alerts</h6>
            <div class="mT-30">
                <div class="alert alert-primary" role="alert">
                    This is a primary alert—check it out!
                </div>
                <div class="alert alert-secondary" role="alert">
                    This is a secondary alert—check it out!
                </div>
                <div class="alert alert-success" role="alert">
                    This is a success alert—check it out!
                </div>
                <div class="alert alert-danger" role="alert">
                    This is a danger alert—check it out!
                </div>
                <div class="alert alert-warning" role="alert">
                    This is a warning alert—check it out!
                </div>
                <div class="alert alert-info" role="alert">
                    This is a info alert—check it out!
                </div>
                <div class="alert alert-light" role="alert">
                    This is a light alert—check it out!
                </div>
                <div class="alert alert-dark" role="alert">
                    This is a dark alert—check it out!
                </div>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Buttons</h6>
            <div class="mT-30">
                <div class="gap-10 peers">
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-primary btn-color">Primary</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-secondary btn-color">Secondary</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-success btn-color">Success</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-danger btn-color">Danger</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-warning">Warning</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-info btn-color">Info</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-light">Light</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-dark btn-color">Dark</button>
                    </div>
                </div>
                
                <div class="w-100 gap-10 peers mY-20">
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-primary">Primary</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-secondary">Secondary</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-success">Success</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-danger">Danger</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-warning">Warning</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-info">Info</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-light">Light</button>
                    </div>
                    <div class="peer">
                        <button type="button" class="btn cur-p btn-outline-dark">Dark</button>
                    </div>
                </div>
                
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-success btn-color">1</button>
                        <button type="button" class="btn btn-success btn-color">2</button>
                        <button type="button" class="btn btn-success btn-color">3</button>
                        <button type="button" class="btn btn-success btn-color">4</button>
                    </div>
                    <div class="btn-group me-2" role="group" aria-label="Second group">
                        <button type="button" class="btn btn-success btn-color">5</button>
                        <button type="button" class="btn btn-success btn-color">6</button>
                        <button type="button" class="btn btn-success btn-color">7</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-success btn-color">8</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Dropdowns</h6>
            <div class="mT-30">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                
                
                <div class="btn-group mT-20">
                    <button type="button" class="btn btn-danger btn-color">Action</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">List Group</h6>
            <div class="mT-30">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        The current link item
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                    <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
                </div>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Modal</h6>
            <div class="mT-30">
                
                <button type="button" class="btn btn-primary btn-color" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>
                
                
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Popover</h6>
            <div class="mT-30">
                <button type="button" class="btn btn-lg btn-danger btn-color" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Progress</h6>
            <div class="mT-30">
                
                <div class="layers">
                    <div class="layer w-100">
                        <h5 class="mB-5">100k</h5>
                        <small class="fw-600 c-grey-700">Visitors From USA</small>
                        <span class="pull-right c-grey-600 fsz-sm">50%</span>
                        <div class="progress mT-10">
                            <div class="progress-bar bgc-deep-purple-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span></div>
                        </div>
                    </div>
                    <div class="layer w-100 mT-15">
                        <h5 class="mB-5">1M</h5>
                        <small class="fw-600 c-grey-700">Visitors From Europe</small>
                        <span class="pull-right c-grey-600 fsz-sm">80%</span>
                        <div class="progress mT-10">
                            <div class="progress-bar bgc-green-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">80% Complete</span></div>
                        </div>
                    </div>
                    <div class="layer w-100 mT-15">
                        <h5 class="mB-5">450k</h5>
                        <small class="fw-600 c-grey-700">Visitors From Australia</small>
                        <span class="pull-right c-grey-600 fsz-sm">40%</span>
                        <div class="progress mT-10">
                            <div class="progress-bar bgc-light-blue-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">40% Complete</span></div>
                        </div>
                    </div>
                    <div class="layer w-100 mT-15">
                        <h5 class="mB-5">1B</h5>
                        <small class="fw-600 c-grey-700">Visitors From India</small>
                        <span class="pull-right c-grey-600 fsz-sm">90%</span>
                        <div class="progress mT-10">
                            <div class="progress-bar bgc-blue-grey-500" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">90% Complete</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Tootips</h6>
            <div class="mT-30">
                <button type="button" class="btn btn-primary btn-color" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                    Tooltip on top
                </button>
                <button type="button" class="btn btn-secondary btn-color" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                    Tooltip on right
                </button>
                <button type="button" class="btn btn-success btn-color" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                    Tooltip on bottom
                </button>
                <button type="button" class="btn btn-danger btn-color" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">
                    Tooltip on left
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts here to be added at the bottom of page after </body> --}}
@section('scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        
        window.addEventListener('load', function() {
            var form = document.getElementById('needs-validation');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>
@endsection