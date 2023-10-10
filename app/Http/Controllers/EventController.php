<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStore;
use App\Models\Brand;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        $data = [
            'events' => $events,
        ];

        return view('dashboard.events.index')->with($data);
    }

    public function create()
    {
        return view('dashboard.events.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('events.create')
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->get('name');
        $description = $request->get('description');
        $slug = Str::slug($request->get('name'));

        $image      = $request->get('image');
        $imageObj   = new ImageStore($request, 'events');
        $image      = $imageObj->imageStore();

        Event::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'image' => $image,
        ]);

        return redirect()->route('events.index');
    }

    public function show($id)
    {
        $event = Event::FindorFail($id);

        $data = [
            'event' => $event,
        ];

        return view('dashboard.events.show')->with($data);
    }

    public function edit($id)
    {
        $event = Event::FindorFail($id);

        $data = [
            'event' => $event,
        ];

        return view('dashboard.events.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name'         => 'required|max:255',
            'description'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event    = Event::FindorFail($id);

        $input      = $request->all();

        $event->fill($input)->save();

        return redirect()->route('events.index');
    }

    public function destroy($id)
    {
        $event    = Event::FindorFail($id);
        $event->delete();
        return redirect()->route('events.index');
    }
}
