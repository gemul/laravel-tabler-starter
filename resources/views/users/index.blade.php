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
@if(session()->has('error'))
<div class="row mt-1">
    <div class="col-12">
        <div class="alert alert-danger mb-1">
            {{ session()->get('error') }}
        </div>
    </div>
</div>
@endif
@if(session()->has('success'))
<div class="row mt-1">
    <div class="col-12">
        <div class="alert alert-success mb-1">
            {{ session()->get('success') }}
        </div>
    </div>
</div>
@endif
<div class="row row-cards mt-1">
    @foreach ($users as $user)
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body p-4 text-center">
            @if ($user->avatar)
                <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(/storage/avatar/{{ $user->avatar }})"></span>
            @else
                <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
            @endif
            <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
            <div class="text-secondary">{{ $user->username }}</div>
            <div class="mt-3">
                <span class="badge bg-purple-lt">User</span>
            </div>
            </div>
            <div class="d-flex">
            <a href="/admin/users/edit/{{ $user->id_user }}" class="card-btn p-1">
                <i class="mdi mdi-pencil-outline me-2 fs-2"></i>
                Edit</a>
            <a onclick="deleteItem('{{ $user->id_user }}')" class="card-btn p-1">
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
    function deleteItem(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const xhr = new XMLHttpRequest();
                xhr.open('DELETE', '/admin/users/delete/'+id, true);
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                xhr.onloadstart = function() {
                    Swal.fire({
                        title: 'Please Wait',
                        html: 'Deleting user...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                };
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 400) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong'
                        });
                    }
                };
                xhr.send();
            }
        });
    }
</script>
@endsection