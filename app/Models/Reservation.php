<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['check_in', 'check_out', 'best_hotel_id'];

    protected $with = [
        'hotels'
    ];

    // Define the relationship between Reservation and hotels
    public function hotels()
    {
        return $this->belongsTo(BestHotel::class, 'best_hotel_id', 'id');
    }
}
