@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Upload Photo</h1>

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Photo Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo File</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
