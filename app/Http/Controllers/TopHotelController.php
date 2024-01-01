<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopHotelResourceCollection;
use App\Models\TopHotel;
use App\Services\TopHotelsService;

class TopHotelController extends Controller
{
    public function allData()
    {
        $bestHotels = TopHotel::all();
        return TopHotelResourceCollection::collection($bestHotels);
    }

    public function exportToExcel(TopHotelsService $topHotelsService): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $fileName = 'top_hotels_data.xlsx';
        $topHotelsService->exportToExcel($fileName);

//        ->deleteFileAfterSend(true)
        return response()->download(storage_path('app/' . $fileName));
    }
}
