<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DescriptionController extends Controller
{
    public function index()
    {
        $desc = Description::paginate(10);
        return view('pages.description.index', ['desc' => $desc]);
    }

    public function create()
    {
        $pricing = Pricing::all();
        return view('pages.description.create-description', ['pricing' => $pricing]);
    }

    public function store(Request $request)
    {
        $pricing = Pricing::first();
        $desc = Description::create($request->all());
        $desc->package_description = $request->input('package_description');
        $desc->status = $request->status;
        $desc->package = $request->package;
        $desc->save();
        // dd($desc);
        toast('Deskripsi Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('description.index');
    }

    public function edit($id)
    {
        $pricing = Pricing::all();
        $desc = Description::findOrFail($id);

        return view('pages.description.edit-description', ['desc' => $desc, 'pricing' => $pricing]);
    }

    public function update(Request $request, $id)
    {
        $desc = Description::where('id', $id)->first();
        $desc->update($request->all());
        $desc->package_description = $request->input('package_description');
        $desc->status = $request->status;
        $desc->package = $request->package;
        $desc->save();

        // dd($desc);
        toast('Deskripsi Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('description.index');
    }

    public function destroy($id)
    {
        $desc = Description::findOrFail($id);
        $desc->delete();
        toast('Deskripsi Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('description.index');
    }
}
