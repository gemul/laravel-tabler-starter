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
            <h3 class="p-0 m-0">
                {{ isset($user) ? 'Edit' : 'Add' }} User
            </h3>
            @if(isset($user))
            <div class="text-muted">Editing {{ $user->username }}</div>
            @else
            <div class="text-muted">Fill in the form below to add a new user</div>
            @endif
        </div>
        <div class="ms-md-auto mt-2 mt-md-0">
            <a href="/admin/users" class="btn btn-outline-primary"><i class="mdi mdi-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="row mt-1">
    <div class="col-12">
        <div class="alert alert-danger mb-1">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
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
<div class="row mt-1">
    <div class="col-12">
        <form action="{{ isset($user) ? '/admin/users/store/'.$user->id_user : '/admin/users/store' }}" method="post" enctype="multipart/form-data">
            <div class="card mt-1">
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="mb-2">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ isset($user) ? $user->username : old('username') }}">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for"password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-2">
                                <label class="form-label" for="Avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="dropify" data-default-file="{{ isset($user) ? asset('storage/'.$user->avatar) : '' }}">
                                <div>
                                    @if (isset($user) && $user->avatar)
                                    <img src="{{ asset('storage/avatar/'.$user->avatar) }}" class="img-fluid mt-2" alt="Avatar">
                                    @else
                                    No avatar uploaded
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Add' }} User</button>
                    <a href="/admin/users" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

{{-- Scripts here to be added at the bottom of page after </body> --}}
@section('scripts')
<script type="text/javascript">
</script>
@endsection