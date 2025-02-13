@extends('layouts.app')
@section('title', $title)

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <form style="border: 1px solid grey;" class="p-5 rounded d-flex flex-column" method="POST"
            action="{{ url('/') }}">
            @csrf
            <div class="mb-3 text-center">
                <h3>Login</h3>
            </div>

            @if (session('error_message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_message') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required name="email"
                    value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required name="password">
            </div>
            <div class="mt-3 d-flex flex-column w-full">
                <a class="btn btn-secondary" href="/register">Register</a>
                <button type="submit" class="btn mt-3 btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
