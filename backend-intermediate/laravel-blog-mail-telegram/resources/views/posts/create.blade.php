@extends('layouts.app')
@section('title', $title)

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <form style="border: 1px solid grey" class="p-5 rounded d-flex flex-column" method="POST" action="{{ url('/posts') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" required name="title">
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="content" id="floatingTextarea" cols="35" rows="50" style="resize: none"
                    required></textarea>
                <label for="floatingTextarea">Content</label>
            </div>
            <div class="mt-3 mx-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
