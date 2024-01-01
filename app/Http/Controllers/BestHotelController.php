<?php

namespace App\Http\Controllers;

use App\Http\Resources\BestHotelResourceCollection;
use App\Models\BestHotel;
use App\Services\BestHotelsService;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\MappedReader;


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

//        $bestHotelsData = $this->readChunkedData($bestHotelsFilePath);
//        $topHotelsData = $this->readChunkedData($topHotelsFilePath);
        return view('excel_data', compact('bestHotelsData', 'topHotelsData'));
    }

//    private function readChunkedData($filePath): array
//    {
//        $dataChunks = [];
//        Excel::filter('chunk')->load($filePath)->chunk(1000, function ($results) use (&$dataChunks) {
//            $dataChunks[] = $results->toArray();
//        });
//            return $dataChunks;

//        $dataChunks = [];
//        $chunkSize = 1;
//
//        $data = Excel::toArray((object)[], $filePath);
//
//        $totalRows = count($data[0]);
//        $chunkCount = ceil($totalRows / $chunkSize);
//
//        for ($i = 0; $i < $chunkCount; $i++) {
//            $start = $i * $chunkSize;
//            $chunk = array_slice($data[0], $start, $chunkSize);
//            $dataChunks[] = $chunk;
//        }
//
//        return $dataChunks;
//    }

}

