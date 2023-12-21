@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

<style>
    .eyes {
    position: absolute;
    right: 2rem;
    top: 0.78rem;
    cursor: pointer;
    /* display: none; */
    }
    .eyeshide {
    position: absolute;
    right: 2rem;
    top: 0.78rem;
    cursor: pointer;
    }
</style>

<script>
    function change(){
    var x = document.getElementById('password').type;

        if(x == "password"){
            document.getElementById('password').type = 'text';
            document.getElementById('eyes').innerHTML = '<i class="fa-regular fa-eye eyes"></i>';
        } else {
            document.getElementById('password').type = 'password';
            document.getElementById('eyes').innerHTML = '<i class="fa-regular fa-eye-slash eyes"></i>';
        }
    }

    function change2(){
        var y = document.getElementById('password_confirmation').type;

        if(y == "password"){
            document.getElementById('password_confirmation').type = 'text';
            document.getElementById('eyes2').innerHTML = '<i class="fa-regular fa-eye eyes"></i>';
        } else {
            document.getElementById('password_confirmation').type = 'password';
            document.getElementById('eyes2').innerHTML = '<i class="fa-regular fa-eye-slash eyes"></i>';
        }
    }
// </script>

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Edit</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">Forms</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">User <i class="fa fa-user text-primary"></i></h2>
                <div class="card">
                    <form action="{{ route('user.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ $user->password }}" disabled>
                                    {{-- <span toggle="#password" onclick="change()" id = "eyes">
                                        <i class="fa-regular fa-eye-slash eyes"></i>
                                    </span> --}}
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password Confirmation</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="{{ $user->password }}" disabled>
                                    {{-- <span toggle="#password_confirmation" onclick="change2()" id = "eyes2">
                                        <i class="fa-regular fa-eye-slash eyes"></i>
                                    </span> --}}
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="admin" class="selectgroup-input"
                                            @if ($user->roles == 'admin') checked @endif>
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="staff" class="selectgroup-input"
                                            @if ($user->roles == 'staff') checked @endif>
                                        <span class="selectgroup-button">Staff</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="user" class="selectgroup-input"
                                            @if ($user->roles == 'user') checked @endif>
                                        <span class="selectgroup-button">User</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
