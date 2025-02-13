@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
        <form action="{{ route('login') }}" method="post" class="w-25 border border-secondary p-4">
            @csrf
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                @error('email')
                    <div class="text-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                @error('password')
                    <div class="text-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
            </div>
            <div class="d-flex">
                <button type="submit" class="mx-auto btn btn-primary">Submit</button>
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>
        </form>
    </div>
@endsection
