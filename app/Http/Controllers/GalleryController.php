<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Repositories\UploadFile;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $image;

    public function __construct()
    {
        $this->image = (new UploadFile());
    }

    public function index()
    {
        $gallery = Gallery::paginate(5);
        return view('pages.gallery.index',['gallery' => $gallery]);
    }

    public function create()
    {
        return view('pages.gallery.create');
    }

    public function store(Request $request)
    {
        $image = (new UploadFile())->uploadImage($request);
        $gallery = Gallery::create($request->all());
        $gallery->image = $image;
        $gallery->utility = $request->utility;
        $gallery->save();

        toast('Galeri Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('gallery.index');
    }

    public function edit($id)
    {
        $gallery = Gallery::where('id', $id)->first();

        return view('pages.gallery.edit', ['gallery' => $gallery]);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::where('id',$id)->first();
        if($request->file('image')){
            $image = (new UploadFile())->uploadImage($request);
        } else {
            $image = $gallery->image;
        }
        $gallery->update($request->all());
        $gallery->image = $image;
        $gallery->utility = $request->utility;
        $gallery->save();

        toast('Galeri Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('gallery.index');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        toast('Galeri Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('gallery.index');
    }
}
