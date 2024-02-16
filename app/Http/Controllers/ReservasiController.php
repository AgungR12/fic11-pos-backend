<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index(Request $request)
    {
        $reservasi = Reservasi::when($request->input('name'), function($query, $name){
            return $query->where('name', 'LIKE', '%'.$name.'%');
        })->orderBy('id','desc')->paginate(10);

        return view('pages.reservasi.index', ['reservasi' => $reservasi]);
    }

    public function create()
    {
        return view('pages.reservasi.create');
    }

    public function store(Request $request)
    {
        $reservasi = Reservasi::create($request->all());
        $reservasi->name = $request->input('name');
        $reservasi->email = $request->input('email');
        $reservasi->phone = $request->input('phone');
        $reservasi->early_time = $request->early_time;
        $reservasi->end_time = $request->end_time;
        $reservasi->date = $request->date;
        $reservasi->message = $request->message;
        $reservasi->people = $request->people;
        $reservasi->save();

        toast('Reservasi Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('reservasi.index');
    }

    public function edit($id)
    {
        $reservasi = Reservasi::where('id',$id)->first();

        return view('pages.reservasi.edit', ['reservasi' => $reservasi]);
    }

    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::where('id', $id)->first();
        $reservasi->update($request->all());
        $reservasi->name = $request->input('name');
        $reservasi->email = $request->input('email');
        $reservasi->phone = $request->input('phone');
        $reservasi->early_time = $request->early_time;
        $reservasi->end_time = $request->end_time;
        $reservasi->date = $request->date;
        $reservasi->message = $request->message;
        $reservasi->people = $request->people;
        $reservasi->save();

        toast('Reservasi Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('reservasi.index');
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        toast('Reservasi Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('reservasi.index');
    }
}

