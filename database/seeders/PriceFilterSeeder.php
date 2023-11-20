<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PriceFilter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pricesRange = [
            [
                'min' => 20,
                'max' => 50,
                'created_at' => Carbon::now(),
            ],
            [
                'min' => 51,
                'max' => 100,
                'created_at' => Carbon::now(),
            ],
            [
                'min' => 101,
                'max' => 150,
                'created_at' => Carbon::now(),
            ],
            [
                'min' => 151,
                'max' => 200,
                'created_at' => Carbon::now(),
            ],
            [
                'min' => 201,
                'max' => 300,
                'created_at' => Carbon::now(),
            ],
            
        ];
        PriceFilter::insert($pricesRange);
    
    }
}
