@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <form style="border: 1px solid grey;" class="p-5 w-50 rounded d-flex flex-column" method="POST"
            action="{{ url('/register') }}">
            @csrf
            <div class="mb-3 text-center">
                <h3>Register</h3>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" required name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required name="password"
                    value="{{ old('password') }}">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password confirm</label>
                <input type="password" class="form-control" id="password_confirmation" required
                    name="password_confirmation">
            </div>
            <div class="mt-3 d-flex flex-column w-full">
                <a class="btn btn-secondary" href="/">Login</a>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </form>
    </div>
@endsection
