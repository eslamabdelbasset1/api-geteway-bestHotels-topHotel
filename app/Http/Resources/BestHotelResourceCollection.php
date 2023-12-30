<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BestHotelResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'Provider' => 'Best Provider',
            'Hotel Name' => $this->hotelName,
            'Rate' => $this->rate,
            'Hotel Fare' => $this->hotelFare,
            'Room Amenities' => $this->roomAmenities,
        ];
    }
}
