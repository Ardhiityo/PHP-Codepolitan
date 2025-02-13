@extends('layouts.app')

@section('content')
    <div class="border rounded mt-5 mx-auto d-flex flex-column align-items-stretch bg-white" style="width: 380px;">
        <div class="d-flex justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
            <span class="fs-5 fw-semibold">
                Task Lists : {{ $data->total() }}</span>
            <a class="btn btn-sm btn-primary" href="{{ url('/tasks/create') }}">add</a>
        </div>
        <div class="list-group list-group-flush border-bottom scrollarea">
            @foreach ($data as $item)
                <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">{{ $item->task }}</strong>
                        <small>Wed</small>
                    </div>

                    <div class="col-10 mb-1 small">{{ $item->user }}</div>
                    <div class="group-action d-flex gap-1 justify-content-start align-items-center">
                        <a href="{{ url("/tasks/$item->id/edit") }}" class="btn btn-warning btn-sm">edit</a>
                        <form action="{{ url("/tasks/$item->id") }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-danger border-0 btn-sm">delete</button>
                        </form>
                    </div>

                </div>
            @endforeach
            <div class="d-flex justify-content-center flex-shrink-0 p-3 link-dark  border-bottom">
                <span class="fs-5 fw-semibold">
                    {{ $data->links('pagination::bootstrap-4') }}
                </span>
            </div>
        </div>
    </div>
@endsection
