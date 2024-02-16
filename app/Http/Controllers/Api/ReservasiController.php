<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        return response()->json(['data' => $reservasi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservasi = Reservasi::create($request->all());

        if($reservasi->successful()){
            toast('Berhasil','success')->position('top');
            return response()->json(['data' => $reservasi]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
