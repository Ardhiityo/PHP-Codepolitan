@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
        <form action="{{ route('verification.send') }}" method="post" class="w-25 border border-secondary p-4">
            @csrf
            <div class="mb-3">
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success" role="alert">
                        A new email verification link has been emailed to you!
                    </div>
                @else
                    <div class="mb-3">
                        <div class="alert alert-success" role="alert">
                            We just sent you a verification email, please check your email, or if it has not been sent click
                            resend
                        </div>
                    </div>
                @endif
            </div>
            <div class="d-flex">
                <button type="submit" class="mx-auto btn btn-primary btn-sm">Resend</button>
            </div>
        </form>
    </div>
@endsection
