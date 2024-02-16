<?php

namespace App\Http\Controllers;

use App\Models\Superiority;
use App\Models\SuperiorityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SuperiorityController extends Controller
{
    public function index()
    {
        $superPos = Superiority::paginate(10);

        return view('pages.superiority.index', ['superPos' => $superPos]);
    }

    public function create()
    {
        return view('pages.superiority.create');
    }

    public function store(Request $request)
    {
        $superPos = Superiority::create($request->all());
            $superPos->subject = $request->input('subject');
            $superPos->description = $request->description;
            $superPos->information = $request->information;
            $superPos->status = $request->status;
            $superPos->save();

        toast('Kegunaan Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('superiority.index');
    }

    public function edit($id)
    {
        $superPos = Superiority::where('id', $id)->first();

        return view('pages.superiority.edit', ['superPos' => $superPos]);
    }

    public function update(Request $request, $id)
    {
        $superPos = Superiority::where('id', $id)->first();
        $superPos->update($request->all());
        $superPos->subject = $request->input('subject');
        $superPos->description = $request->description;
        $superPos->information = $request->information;
        $superPos->status = $request->status;
        $superPos->save();

    toast('Kegunaan Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
    return redirect()->route('superiority.index');
    }

    public function destroy($id)
    {
        $superPos = Superiority::findOrFail($id);
        $superPos->delete();

        toast('Kegunaan Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('superiority.index');
    }
}
