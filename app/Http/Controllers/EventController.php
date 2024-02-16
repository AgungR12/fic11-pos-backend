<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Repositories\UploadFile;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::when($request->input('name'), function($query, $name){
            return $query->where('name', 'like', '%'. $name.'%');
        })->orderBy('id','desc')->paginate(10);
        return view('pages.event.index', ['events' => $events]);
    }

    public function create()
    {
        return view('pages.event.create');
    }

    public function store(Request $request)
    {
        $image = (new UploadFile())->uploadImage($request);
        $event = Event::create($request->all());
        $event->image = $image;
        $event->name = $request->input('name');
        $event->price = $request->input('price');
        $event->information = $request->information;
        $event->save();

        toast('Event Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('event.index');
    }

    public function edit($id)
    {
        $event = Event::where('id',$id)->first();

        return view('pages.event.edit', ['event' => $event]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::where('id',$id)->first();
        $event->update($request->all());
        if($request->file('image')){
            $image = (new UploadFile())->updateImageAll($request);
        } else {
            $image = $event->image;
        }
        $event->name = $request->input('name');
        $event->image = $image;
        $event->price = $request->input('price');
        $event->information = $request->information;
        $event->save();

        toast('Event Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('event.index');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        toast('Event Berhasil Dihapus','success')->position('top')->autoClose(5000);
        return redirect()->route('event.index');
    }
}
