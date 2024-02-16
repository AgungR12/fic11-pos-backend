<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('pages.profile.index', ['profile' => $profile]);
    }

    public function update(Request $request)
    {
        $profile = Profile::first();
        $profile->update($request->all());
        $profile->google_maps = $request->input('google_maps');
        $profile->address = $request->input('address');
        $profile->complete_address = $request->input('complete_address');
        $profile->phone = $request->input('phone');
        $profile->email = $request->email;

        toast('Profil Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('profile.index');
    }
}
