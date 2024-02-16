<?php

namespace Database\Seeders;

use App\Models\WorkingHours;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkingHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'day' => 'Senin',
                'information' => 'work',
                'time_zone' => 'WIB'
            ],
            [
                'day' => 'Selasa',
                'information' => 'work',
                'time_zone' => 'WIB'
            ],
            [
                'day' => 'Rabu',
                'information' => 'work',
                'time_zone' => 'WIB'
            ],
            [
                'day' => 'Kamis',
                'information' => 'work',
                'time_zone' => 'WIB'
            ],
            [
                'day' => 'Jumat',
                'information' => 'work',
                'time_zone' => 'WIB'
            ],
            [
                'day' => 'Sabtu',
                'information' => 'work',
                'time_zone' => 'WIB'
            ],
            [
                'day' => 'Minggu',
                'information' => 'work',
                'time_zone' => 'WIB'
            ],
        ];

        foreach ($data as $value) {
            WorkingHours::insert([
                'day' => $value['day'],
                'information' => $value['information'],
                'time_zone' => $value['time_zone'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
