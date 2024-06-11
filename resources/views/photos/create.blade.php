@extends('layout.app')
@section('content')
    <div class="container">
        <h1>Add Photo</h1>
        <form action="{{ route('photo-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input hidden name="album_id" value="{{ $album_id }}">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
