@extends('layout.app')
@section('content')
    <div class="container">
        <h2>{{ $photo->title }}</h2>
        <p>{{ $photo->description }}</p>
        <form method="post" action="{{route('photo-delete',$photo->id)}}">
        <a href="/albums/{{ $photo->album_id }}" class="btn btn-primary">Go Back</a>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger float-right">Delete</button>
        </form>
        {{-- <a href="{{}}" class="btn btn-danger float-right">Delete</a> --}}

        <img src="/storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}" width="990px">
    </div>
@endsection
