@extends('layouts.base')

@section('title', 'Register')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        <main class="form-signin">
            <form method="POST" action="{{ url('register') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
                    <label for="password_confirmation">Password Confirmation</label>
                </div>
                <button class="w-100 btn btn-md btn-primary" type="submit">Register</button>
                <small class="mt-2 d-block text-center">Already have an account? 
                    <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                </small>
            </form>
        </main>
    </div>
</div>
@endsection