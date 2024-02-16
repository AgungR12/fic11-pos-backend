<?php

namespace App\Http\Controllers;

use App\Models\SuperiorityEvent;
use Illuminate\Http\Request;

class SuperiorityEventController extends Controller
{
    public function index()
    {
        $superResto = SuperiorityEvent::paginate(10);

        return view('pages.superiorityEvent.index', ['superResto' => $superResto]);
    }

    public function create()
    {
        return view('pages.superiorityEvent.create');
    }

    public function store(Request $request)
    {
        $superResto = SuperiorityEvent::create($request->all());
            $superResto->subject = $request->input('subject');
            $superResto->description = $request->description;
            $superResto->information = $request->information;
            $superResto->status = $request->status;
            $superResto->save();

        toast('Kegunaan Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('superiorityEvent.index');
    }

    public function edit($id)
    {
        $superResto = SuperiorityEvent::where('id', $id)->first();

        return view('pages.superiorityEvent.edit', ['superResto' => $superResto]);
    }

    public function update(Request $request, $id)
    {
        $superResto = SuperiorityEvent::where('id', $id)->first();
        $superResto->update($request->all());
        $superResto->subject = $request->input('subject');
        $superResto->description = $request->description;
        $superResto->information = $request->information;
        $superResto->status = $request->status;
        $superResto->save();

    toast('Kegunaan Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
    return redirect()->route('superiorityEvent.index');
    }

    public function destroy($id)
    {
        $superResto = SuperiorityEvent::findOrFail($id);
        $superResto->delete();

        toast('Kegunaan Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('superiorityEvent.index');
    }
}
