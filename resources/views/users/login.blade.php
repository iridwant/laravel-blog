@extends('layouts.base')

@section('title', 'Login')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        @if (session()->has('registerSuccess'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('registerSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        <main class="form-signin">
            <form>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-md btn-primary" type="submit">Login</button>
                <small class="mt-2 d-block text-center">Don't have an account yet? 
                    <a href="{{ route('register') }}" class="text-decoration-none">Register now!</a>
                </small>
            </form>
        </main>
    </div>
</div>
@endsection