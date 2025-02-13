@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="container my-5">

        <header class="d-flex gap-2 justify-content-end">
            <a href="{{ url('/posts/create') }}" class="btn btn-primary">Add post</a>
            <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>
        </header>

        <main class="d-flex flex-column justify-content-center">
            @foreach ($posts as $post)
                <div class="card" style="width: 100%; margin-top: 50px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text">{{ $post->getTotalComments() }} Comments</p>
                        <p class="card-text">
                            {{ date('d M Y h:i', strtotime($post->created_at)) }}</p>

                        <a href="{{ url("/posts/$post->id") }}" class="btn btn-primary">
                            Details </a>
                    </div>
                </div>
            @endforeach
        </main>
    </div>
@endsection
