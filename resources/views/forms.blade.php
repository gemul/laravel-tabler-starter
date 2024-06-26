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
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Basic Form</h6>
            <div class="mT-30">
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
                        <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                        <label for="inputCall1" class="form-label peers peer-greed js-sb ai-c">
                            <span class="peer peer-greed">Call John for Dinner</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-color">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Complex Form Layout</h6>
            <div class="mT-30">
                <form>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected="selected">Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label fw-500">Birthdate</label>
                            <div class="timepicker-input input-icon mb-3">
                                <div class="input-group">
                                    <div class="input-group-text bgc-white bd bdwR-0">
                                        <i class="ti-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control bdc-grey-200 start-date" placeholder="Datepicker" data-provide="datepicker">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                            <input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer">
                            <label for="inputCall2" class="form-label peers peer-greed js-sb ai-c">
                                <span class="peer peer-greed">Call John for Dinner</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-color">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Horizontal Form</h6>
            <div class="mT-30">
                <form>
                    <div class="mb-3 row">
                        <label for="inputEmail3" class="form-label col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword3" class="form-label col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <fieldset class="mb-3">
                        <div class="row">
                            <legend class="col-form-legend col-sm-2">Radios</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <label class="form-label form-check-label">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="checked">
                                        Option one is this and that&mdash;be sure to include why it's great
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-label form-check-label">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        Option two can be something else and selecting it will deselect option one
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <label class="form-label form-check-label">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled="disabled">
                                        Option three is disabled
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="mb-3 row">
                        <div class="col-sm-2">Checkbox</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-label form-check-label">
                                    <input class="form-check-input" type="checkbox"> Check me out
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-color">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Disabled Forms</h6>
            <div class="mT-30">
                <form>
                    <fieldset disabled="disabled">
                        <div class="mb-3">
                            <label class="form-label" for="disabledTextInput">Disabled input</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="disabledSelect">Disabled select menu</label>
                            <select id="disabledSelect" class="form-control">
                                <option>Disabled select</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <label class="form-label" class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Can't check this
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-color">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <h6 class="c-grey-900">Validation</h6>
            <div class="mT-30">
                <form class="container" id="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="validationCustom01">First name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="validationCustom02">Last name</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="validationCustom03">City</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom04">State</label>
                            <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom05">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-color" type="submit">Submit form</button>
                </form>
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