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

class ProcessTopHotelsJob implements ShouldQueue
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
        $filePath = storage_path('app/top_hotels_data.xlsx');
        $topHotelsData = Excel::toArray([], $filePath);
        for ($i = 1, $iMax = count($topHotelsData[0]); $i < $iMax; $i++) {
            $hotel = $topHotelsData[0][$i]; // Access the hotel data from the current index

            $redisKey = "top_hotel:$i";
            Redis::hmset($redisKey, [
                'hotelName' => $hotel[0], // Assuming 'hotelName' is at index 0
                'rate' => $hotel[1],     // Assuming 'rate' is at index 1
                'price' => $hotel[2] ?? null, // Assuming 'hotelFare' is at index 2
                'discount' => $hotel[3] ?? null, // Assuming 'hotelFare' is at index 2
                'roomAmenities' => $hotel[4] ?? null, // Assuming 'roomAmenities' is at index 3
                // Include other fields as per your Excel column positions
            ]);
        }


//        foreach ($topHotelsData as $index => $hotel) {
//            $redisKey = "best_hotel:$index";
//            Redis::set($redisKey, [
//                'hotelName' => $hotel['hotelName'],
//                'rate' => $hotel['rate'],
//                'price' => $hotel['price'],
//                'discount' => $hotel['discount'],
//                'roomAmenities' => $hotel['roomAmenities'],
//            ]);
//        }
    }
}
