<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventExcellence;
use App\Models\Superiority;
use App\Models\SuperiorityEvent;
use Illuminate\Http\Request;

class SuperiorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superiority = Superiority::all();
        $eventExcellence = SuperiorityEvent::all();

        return response()->json(['data' => $superiority, 'data2' => $eventExcellence]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
