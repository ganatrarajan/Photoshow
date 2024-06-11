<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::get();
        return view('albums.index')->with('albums',$albums);
    }
    public function create()
    {
        return view('albums.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'coverImage' => 'required|image'
        ]);
        // dd($request);
        $filenamewithextension = $request->file('coverImage')->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->file('coverImage')->getClientOriginalExtension();
        $filenameTostore = $filename .'_'. time() . '.' . $extension;
        // dd($filenameTostore);

        $request->file('coverImage')->storeAs('public/albums_covers',$filenameTostore);
        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameTostore;
        $album->save();

        return redirect('/albums')->with('success','Album created successfully!');

    }

    public function show($id)
    {
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album',$album);
    }
}
