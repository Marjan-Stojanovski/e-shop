<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStore;
use App\Http\Controllers\Helpers\ImageStoreMultiple;
use App\Models\Album;
use App\Models\Event;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Helpers\ImageStoreCover;

class AlbumController extends Controller
{

    public function index()
    {
        $albums = Album::all();

        $data = [
            'albums' => $albums,
        ];

        return view('dashboard.albums.index')->with($data);
    }

    public function create()
    {
        $events = Event::all();

        $data = [
            'events' => $events,
        ];

        return view('dashboard.albums.create')->with($data);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|max:255',
            'image'         => 'required',
            'event_id'   => 'required',
            'coverImg'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));

        $coverImg = $request['coverImg'];
        $imageObj = new ImageStoreCover($request, 'albums');
        $coverImg = $imageObj->imageStore();
        $eventId = $request->get('event_id');

        $album = Album::create([
            'event_id' => $eventId,
            'name' => $albumName,
            'slug' => $slug,
            'coverImg' => $coverImg
        ]);
        $album_id = $album->id;

        $this->validate($request, [
            'image' => 'required',
            'image.*' => 'image'
        ]);

        $files = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $tempName = $file->getClientOriginalName();
                $name = rand(1000, 100000) . '-' . $tempName;
                $file->move(public_path('/assets/img/gallery/albums/'), $name);
                $files[] = $name;
            }
        }

        foreach ($files as $file) {
            Picture::create([
                'album_id' => $album_id,
                'image' => $file,
            ]);
        }


        return redirect()->route('albums.index');

    }

    public function destroy($id)
    {

        $album = Album::FindorFail($id);

        $album->delete();

        return redirect()->route('albums.index');
    }

}
