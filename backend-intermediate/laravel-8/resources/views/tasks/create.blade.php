@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column mt-5 w-50 justify-content-center">
        <form action="{{ url('/tasks') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User</label>
                @error('user')
                    <div class="text-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" class="form-control" id="exampleFormControlInput1" name="user"
                    value="{{ old('user') }}">
            </div>
            <div class="mb-5">
                <label for="exampleFormControlTextarea1" class="form-label">Task</label>
                @error('task')
                    <div class="text-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="task">{{ old('task') }}</textarea>
            </div>
            <div class="d-flex">
                <button type="submit" class="mx-auto btn btn-primary btn-lg">Create task</button>
            </div>
        </form>
    </div>
@endsection
