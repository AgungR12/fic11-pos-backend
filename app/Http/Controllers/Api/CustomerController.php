<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Customers::all();
        return response()->json(['data' => $comments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comments = Customers::create($request->all());
        // dd($request->all());
        return response()->json(['data' => $comments]);
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
