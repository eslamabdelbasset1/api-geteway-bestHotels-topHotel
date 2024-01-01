<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;

class ProcessBestHotelsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filePath = storage_path('app/best_hotels_data.xlsx');
        $bestHotelsData = Excel::toArray([], $filePath);

        for ($i = 1, $iMax = count($bestHotelsData[0]); $i < $iMax; $i++) {
            $hotel = $bestHotelsData[0][$i]; // Access the hotel data from the current index

            $redisKey = "best_hotel:$i";
            Redis::hmset($redisKey, [
                'hotelName' => $hotel[0], // Assuming 'hotelName' is at index 0
                'rate' => $hotel[1],     // Assuming 'rate' is at index 1
                'hotelFare' => $hotel[2], // Assuming 'hotelFare' is at index 2
                'roomAmenities' => $hotel[3], // Assuming 'roomAmenities' is at index 3
                // Include other fields as per your Excel column positions
            ]);
        }







//
//        foreach ($bestHotelsData as $index => $hotel) {
//            $redisKey = "best_hotel:$index";
//            Redis::set($redisKey, [
//                'hotelName' => $hotel['hotelName'],
//                'rate' => $hotel['rate'],
//                'hotelFare' => $hotel['hotelFare'],
//                'roomAmenities' => $hotel['roomAmenities'],
//            ]);
//        }

    }
}
