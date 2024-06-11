<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($id)
    {
        return view('photos.create')->with('album_id',$id);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image'
        ]);
        // dd($request);
        $filenamewithextension = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameTostore = $filename .'_'. time() . '.' . $extension;
        // dd($filenameTostore);

        $album_id = $request->input('album_id');

        $request->file('photo')->storeAs('public/albums/'.$album_id,$filenameTostore);
        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $filenameTostore;
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $album_id;
        $photo->save();

        return redirect('/albums/'.$album_id)->with('success','Photo uploaded successfully!');

    }
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo',$photo);
    }

    public function delete($id)
    {
        $photo = Photo::find($id);
        if(Storage::delete('public/albums/'.$photo->album_id.'/'.$photo->photo))
        {
            $photo->delete();
            return redirect('/')->with('success','Photo deleted successfully!');
        }
    }
}
