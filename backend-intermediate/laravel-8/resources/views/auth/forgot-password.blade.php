@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
        <form action="{{ route('password.email') }}" method="post" class="w-25 border border-secondary p-4">
            @csrf
            <div class="mb-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <label for="email" class="form-label">Email</label>
                @error('email')
                    <div class="text-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="d-flex">
                <button type="submit" class="mx-auto btn btn-primary">Send link</button>
            </div>
        </form>
    </div>
@endsection
