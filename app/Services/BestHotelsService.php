<?php

namespace App\Services;

use App\Models\BestHotel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BestHotelsService implements FromCollection, WithHeadings
{
    public function collection(): \Illuminate\Support\Collection
    {
        $response = BestHotel::all();
        return collect($response)->map(function ($data) {
            return new BestHotel([
                'hotelName' => $data['hotelName'],
                'rate ' => $data['rate '],
                'hotelFare' => $data['hotelFare'],
                'roomAmenities' => $data['roomAmenities'],
            ]);
        });
    }

    public function headings(): array
    {
        return [
            'hotelName', 'rate', 'hotelFare', 'roomAmenities',
        ];
    }

    public function exportToExcel(string $fileName): void
    {
        Excel::store($this, $fileName);
    }
}
