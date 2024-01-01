<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopHotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotelName', 'rate', 'price', 'discount', 'roomAmenities',
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id');
    }

}
