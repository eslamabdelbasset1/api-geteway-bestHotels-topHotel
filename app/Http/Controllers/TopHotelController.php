<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopHotelResourceCollection;
use App\Models\TopHotel;
use App\Services\TopHotelsService;
use Maatwebsite\Excel\Facades\Excel;

class TopHotelController extends Controller
{
    public function allData()
    {
        $bestHotels = TopHotel::all();
        return TopHotelResourceCollection::collection($bestHotels);
    }

    public function exportToExcel(TopHotelsService $topHotelsService)
    {
        $fileName = 'top_hotels_data.xlsx';
        $topHotelsService->exportToExcel($fileName);

//        ->deleteFileAfterSend(true)
        return response()->download(storage_path('app/' . $fileName));
    }
    public function topHotelsReadExcel()
    {
        $filePath = storage_path('app/top_hotels_data.xlsx');
        $top_data = Excel::toArray((object)[], $filePath);
        return view('excel_data', compact('top_data'));
    }
}
