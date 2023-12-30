<?php

namespace Database\Seeders;

use App\Models\BestHotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BestHotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BestHotel::factory()->times(20)->create();
    }
}
