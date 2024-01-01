<?php

namespace App\Http\Controllers;

use App\Http\Resources\BestHotelResourceCollection;
use App\Models\BestHotel;
use App\Services\BestHotelsService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BestHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allData()
    {
        $bestHotels = BestHotel::all();
        return BestHotelResourceCollection::collection($bestHotels);
    }

    public function exportToExcel(BestHotelsService $bestHotelsService)
    {
        $fileName = 'best_hotels_data.xlsx';
        $bestHotelsService->exportToExcel($fileName);

//        ->deleteFileAfterSend(true)
        return response()->download(storage_path('app/' . $fileName));
    }
    public function BestHotelsReadExcel()
    {
        $bestHotelsFilePath = storage_path('app/best_hotels_data.xlsx');
        $topHotelsFilePath = storage_path('app/top_hotels_data.xlsx');

        $bestHotelsData = Excel::toArray([], $bestHotelsFilePath);
        $topHotelsData = Excel::toArray([], $topHotelsFilePath);
        return view('excel_data', compact('bestHotelsData', 'topHotelsData'));
    }

}
//Data Chunking
