@extends('layouts.base')

@section('title', 'Register')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        <main class="form-signin">
            <form method="POST" action="{{ url('register') }}">
                @csrf

                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
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