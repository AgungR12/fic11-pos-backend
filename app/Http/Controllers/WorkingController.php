<?php

namespace App\Http\Controllers;

use App\Models\WorkingHours;
use Illuminate\Http\Request;

class WorkingController extends Controller
{
    public function index()
    {
        $working = WorkingHours::paginate(10);
        return view('pages.working.index', ['working' => $working]);
    }

    public function create()
    {
        return view('pages.working.create-working');
    }

    public function store(Request $request)
    {
        $working = WorkingHours::create($request->all());
        $working->day = $request->day;
        $working->information = $request->input('information');
        $working->time_zone = $request->time_zone;
        $working->save();

        toast('Jam Kerja Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('working.index');
    }

    public function edit($id)
    {
        $working = WorkingHours::where('id',$id)->first();
        return view('pages.working.edit-working', ['working' => $working]);
    }

    public function update(Request $request, WorkingHours $working)
    {
        $working->update($request->all());
        $working->day = $request->day;
        $working->information = $request->input('information');
        $working->time_zone = $request->time_zone;
        $working->save();

        toast('Jam Kerja Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('working.index');
    }

    public function destroy($id)
    {
        $working = WorkingHours::findOrFail($id);
        $working->delete();

        toast('Jam Kerja Berhasil Dihapus!', 'success')->position('top')->autoClose(5000);
        return redirect()->route('working.index');
    }
}
