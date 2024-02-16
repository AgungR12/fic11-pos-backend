<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialPackage;
use App\Repositories\UploadFile;

class SpecialPackageController extends Controller
{
    public function index()
    {
        $special = SpecialPackage::paginate(10);

        return view('pages.special.index', ['special' => $special]);
    }

    public function create()
    {
        return view('pages.special.create');
    }

    public function store(Request $request)
    {
        $image = (new UploadFile())->uploadImage($request);
        $special = SpecialPackage::create($request->all());
        $special->name = $request->input('name');
        $special->description = $request->input('description');
        $special->price = $request->price;
        $special->stock = $request->stock;
        $special->image = $image;
        $special->save();

        toast($request->input('name').' Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('special.index');
    }

    public function edit($id)
    {
        $special = SpecialPackage::where('id', $id)->first();

        return view('pages.special.edit', ['special' => $special]);
    }

    public function update(Request $request, $id)
    {
        $special = SpecialPackage::where('id',$id)->first();
        if($request->file('image')){
            $image = (new UploadFile())->uploadImage($request);
        } else {
            $image = $special->image;
        }
        $special->update($request->all());
        $special->name = $request->input('name');
        $special->description = $request->input('description');
        $special->price = $request->price;
        $special->stock = $request->stock;
        $special->image = $image;
        $special->save();

        toast($request->input('name').' Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('special.index');
    }

    public function destroy($id)
    {
        $special = SpecialPackage::findOrFail($id);
        $special->delete();

        toast('Paket Spesial Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('special.index');
    }
}
