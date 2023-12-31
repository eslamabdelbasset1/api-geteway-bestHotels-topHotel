<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopHotelResourceCollection;
use App\Models\TopHotel;
use Illuminate\Http\Request;

class TopHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Simulate a delay of 3 seconds
        sleep(3);
        $bestHotels = TopHotel::all();
        return TopHotelResourceCollection::collection($bestHotels);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
