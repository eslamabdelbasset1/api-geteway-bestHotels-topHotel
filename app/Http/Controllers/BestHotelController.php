<?php

namespace App\Http\Controllers;

use App\Http\Resources\BestHotelResourceCollection;
use App\Jobs\ProcessBestHotelsJob;
use App\Jobs\ProcessTopHotelsJob;
use App\Models\BestHotel;
use App\Services\BestHotelsService;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redis;


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

    public function processExcelSheets()
    {
        ProcessBestHotelsJob::dispatch();
        ProcessTopHotelsJob::dispatch();

        return response()->json(['message' => 'Jobs dispatched to process hotel data.']);
    }


    /**
     * @throws \JsonException
     */
    public function showDataInView()
    {
        $bestHotels = $this->getHotelsData('best_hotel');

        $topHotels = $this->getHotelsData('top_hotel');

        return view('redis_view', compact('bestHotels', 'topHotels'));
    }

    /**
     * @throws \JsonException
     */
    protected function getHotelsData($prefix): array
    {
        $keys = Redis::keys("$prefix:*");
        $hotels = [];
        foreach ($keys as $key) {
            $prefix = 'laravel_database_';
            $desiredKey = substr($key, strlen($prefix));
            $data = Redis::hgetall($desiredKey);
            $hotels[] = $data;

        }
        return $hotels;
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

