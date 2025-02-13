@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="container my-5">

        <header class="d-flex justify-content-start">
            <a href="{{ url('/posts') }}" class="btn btn-primary">Back</a>
        </header>

        <main class="d-flex flex-column justify-content-center">
            <div class="card" style="width: 100%; margin-top: 50px;">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text">{{ date('d M Y h:i', strtotime($post->created_at)) }}</p>

                    <div class="d-flex gap-2">
                        <a href="{{ url("/posts/$post->id/edit") }}" class="btn btn-primary">
                            Edit </a>

                        <form action="{{ url("/posts/$post->id") }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @if (count($comments) > 0)
                <div class="card" style="width: 100%; margin-top: 50px;">
                    @foreach ($comments as $comment)
                        <div class="card-body">
                            <h3 class="card-title">{{ $comment->comment }}</h3>
                            <p class="card-text">{{ date('d M Y h:i', strtotime($comment->created_at)) }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </main>
    @endsection
