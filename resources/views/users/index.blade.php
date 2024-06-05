{{-- Extends main layout --}}
@extends('layout.tabler')

{{-- Page Title --}}
@section('title')
Users Management
@endsection

{{-- Optionally add something here to be added to the <head> like css or meta tag --}}
@section('header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

{{-- Content Section --}}
@section('content')
<div class="row">
    <div class="col-12 d-flex flex-column flex-md-row">
        <div>
            <h3 class="p-0 m-0">Users Management</h3>
            <div class="text-muted">Showing {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }} users</div>
        </div>
        <div class="ms-md-auto mt-2 mt-md-0 d-flex">
            <form action="/admin/users" method="get">
                <input type="search" value="{{ request()->get('search') }}" name="search" class="form-control d-inline-block w-9" placeholder="Search user…">
            </form>
            <div class=" ms-3">
                <a href="/admin/users/create" class="btn btn-primary">Add User</a>
            </div>
        </div>
    </div>
</div>
<div class="row row-cards mt-1">
    @foreach ($users as $user)
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
            <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
            <div class="text-secondary">{{ $user->username }}</div>
            <div class="mt-3">
                <span class="badge bg-purple-lt">User</span>
            </div>
            </div>
            <div class="d-flex">
            <a href="#" class="card-btn p-1">
                <i class="mdi mdi-pencil-outline me-2 fs-2"></i>
                Edit</a>
            <a href="#" class="card-btn p-1">
                <i class="mdi mdi-trash-can-outline me-2 fs-2"></i>
                Delete</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex mt-4">
    <ul class="pagination ms-auto">
    <li class="page-item">
        <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
        <i class="mdi mdi-chevron-left"></i>
        prev
        </a>
    </li>
    <?php
    $paging_start = max(1, $users->currentPage() - 3);
    $paging_end = min($users->lastPage(), $users->currentPage() + 3);
    $show_dots_start = $paging_start > 1;
    $show_dots_end = $paging_end < $users->lastPage();
    ?>
    @if($show_dots_start)
        <li class="page-item">
            <a class="page-link" href="{{ $users->url(1) }}">1</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">...</a>
        </li>
    @endif
    @for($i = $paging_start; $i <= $paging_end; $i++)
        <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
            <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    @if($show_dots_end)
        <li class="page-item disabled">
            <a class="page-link" href="#">...</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ $users->url($users->lastPage()) }}">{{ $users->lastPage() }}</a>
        </li>
    @endif
    <li class="page-item">
        <a class="page-link" href="{{ $users->nextPageUrl() }}">
        next
        <i class="mdi mdi-chevron-right"></i>
        </a>
    </li>
    </ul>
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