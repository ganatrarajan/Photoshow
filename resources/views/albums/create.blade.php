@extends('layout.app')
@section('content')

<h1>Add Albums</h1>
<div class="container">
<form action="{{route('album-store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
    </div>
    <div class="form-group">
        <label for="coverImage">Cover Image:</label>
        <input type="file" class="form-control-file" id="coverImage" name="coverImage" accept="image/*" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
