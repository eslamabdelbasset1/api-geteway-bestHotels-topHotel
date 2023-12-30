<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopHotelResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Provider' => 'Top Provider',
            'Hotel Name' => $this->hotelName,
            'Rate' => $this->rate,
            'Price' => $this->price,
            'Discount' => $this->discount,
            'Room Amenities' => $this->roomAmenities,
        ];
    }
}
