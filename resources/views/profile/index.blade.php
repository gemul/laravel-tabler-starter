{{-- Extends main layout --}}
@extends('layout.tabler')

{{-- Page Title --}}
@section('title')
Profile
@endsection

{{-- Optionally add something here to be added to the <head> like css or meta tag --}}
@section('header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

{{-- Content Section --}}
@section('content')
<div class="row">
    <div class="col-12">
        <h3>User Profile</h3>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form id="profile-form">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-2 col-lg-2">
                            <img src="{{ $avatar_url }}" class="img-fluid rounded-circle" alt="User Image">
                        </div>
                        <div class="col-12 col-sm-9 col-md-10 col-lg-10">
                            <div class="mb-3">
                                <label class="form-label" for="name">Display Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Display Name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $user->username}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="avatar">Change Avatar (1MB max)</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Change Avatar" accept=".jpg, .png" onchange="checkFilesize(this)">
                            </div>
                            <button type="submit" class="btn btn-primary btn-color">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts here to be added at the bottom of page after </body> --}}
@section('scripts')
<script type="text/javascript">
//on form submit (without jquery)
document.getElementById('profile-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = document.getElementById('profile-form');
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/admin/profile/update', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    //multipart form data (because there is a file input)
    xhr.setRequestHeader('enctype', 'multipart/form-data');
    //on sending request
    xhr.onloadstart = function() {
        Swal.fire({
            title: 'Please Wait',
            html: 'Updating profile...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    };
    //on success
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            var response = JSON.parse(xhr.responseText);
            if (response.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message
                });
                //redirect to dashboard after login
                window.location.href = '/admin/dashboard';
            } else if(response.status == 'validation_error') { 
                //show validation errors
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: response.messages.join('<br>'),
                });
            } else {
                //show error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Request failed'
            });
        }
    };
    //on error
    xhr.onerror = function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong. Please try again later.'
        });
    };
    //send request
    xhr.send(formData);
});

function checkFilesize(input) {
    //set max to 1MB
    const maxAllowedSize = 1 * 1024 * 1024;
    if (input.files.length > 0) {
        const fileSize = input.files[0].size;
        if (fileSize > maxAllowedSize) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'File size exceeds 1MB. Please choose a smaller file.'
            });
            input.value = '';
        }
    }
}
</script>
@endsection