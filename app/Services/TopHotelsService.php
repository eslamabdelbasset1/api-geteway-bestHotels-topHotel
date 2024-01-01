<?php

namespace App\Services;

use App\Models\BestHotel;
use App\Models\TopHotel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TopHotelsService implements FromCollection, WithHeadings
{
    public function collection(): \Illuminate\Support\Collection
    {
        $response = TopHotel::all();
        return collect($response)->map(function ($data) {
            return new BestHotel([
                'hotelName' => $data['hotelName'],
                'rate' => $data['rate'],
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
