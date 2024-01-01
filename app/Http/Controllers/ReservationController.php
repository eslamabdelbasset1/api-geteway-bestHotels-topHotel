<?php

namespace App\Http\Controllers;

use App\Models\BestHotel;
use App\Models\Reservation;
use App\Models\TopHotel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;

class ReservationController extends Controller
{
    public function showForm()
    {
        $best_data = BestHotel::all();
        $reservations = Reservation::all();
        return view('reservations.index', compact('best_data', 'reservations'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'best_hotel_id' => 'required',
        ]);

        $check = Reservation::where(['check_in' => $validatedData['check_in'],
        'check_out' => $validatedData['check_out'] , 'best_hotel_id' => $validatedData['best_hotel_id']])->get();
        if (count($check) > 0)
        {
            return redirect()->back()->with(['message' => 'Test']);
        }
//         Create and store reservations in the database
        $x = Reservation::create([
            'check_in' => $validatedData['check_in'],
            'check_out' => $validatedData['check_out'],
            'best_hotel_id' => $validatedData['best_hotel_id'],
        ]);
        return redirect()->back();

    }
}
