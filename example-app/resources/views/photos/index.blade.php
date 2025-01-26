@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Photos</h1>
    <a href="{{ route('photos.create') }}" class="btn btn-primary mb-3">Upload Photo</a>

    <form method="GET" class="mb-3">
        <input type="text" name="filter" class="form-control" placeholder="Filter photos by title...">
    </form>

    <div class="card animate__animated animate__fadeIn">
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $photo->path) }}" class="card-img-top" alt="{{ $photo->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $photo->title }}</h5>
                    <p class="card-text"><small>Uploaded: {{ $photo->created_at->diffForHumans() }}</small></p>
                    <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

