<?php

namespace App\Http\Controllers;

use App\Http\Resources\BestHotelResourceCollection;
use App\Models\BestHotel;
use Illuminate\Http\Request;

class BestHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bestHotels = BestHotel::all();
        return BestHotelResourceCollection::collection($bestHotels);
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
