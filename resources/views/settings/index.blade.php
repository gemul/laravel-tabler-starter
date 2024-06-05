{{-- Extends main layout --}}
@extends('layout.tabler')

{{-- Page Title --}}
@section('title')
Settings
@endsection

{{-- Optionally add something here to be added to the <head> like css or meta tag --}}
@section('header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

{{-- Content Section --}}
@section('content')
<div class="row">
    <div class="col-12">
        <h3>Settings</h3>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form id="change-password-form">
                    <h5 class="card-title">Change Password</h5>
                    
                    <div class="mb-3">
                        <label class="form-label" for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm New Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-color">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        Something else here
    </div>
</div>
@endsection

{{-- Scripts here to be added at the bottom of page after </body> --}}
@section('scripts')
<script type="text/javascript">
//on form submit (without jquery)
document.getElementById('change-password-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = document.getElementById('change-password-form');
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/admin/settings/change_password', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    //on sending request
    xhr.onloadstart = function() {
        Swal.fire({
            title: 'Please Wait',
            html: 'Changing password...',
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
</script>
@endsection