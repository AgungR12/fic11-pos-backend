<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $social = SocialMedia::paginate(5);
        return view('pages.social.index', ['social' => $social]);
    }

    public function create()
    {
        return view('pages.social.create');
    }

    public function store(Request $request)
    {
        $social = SocialMedia::create($request->all());
        $social->name = $request->input('name');
        $social->url = $request->input('url');
        $social->status = $request->status;
        $social->save();

        toast('Sosial Media Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('social.index');
    }

    public function edit($id)
    {
        $social = SocialMedia::where('id', $id)->first();
        return view('pages.social.edit', ['social' => $social]);
    }

    public function update(Request $request, $id)
    {
        $social = SocialMedia::where('id', $id)->first();
        $social->update($request->all());
        $social->name = $request->input('name');
        $social->url = $request->input('url');
        $social->status = $request->status;
        $social->save();

        toast('Sosial Media Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('social.index');
    }

    public function destroy($id)
    {
        $social = SocialMedia::findOrFail($id);
        $social->delete();

        toast('Sosial Media Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('social.index');
    }
}
