<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestHotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotelName', 'rate', 'hotelFare', 'roomAmenities',
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
