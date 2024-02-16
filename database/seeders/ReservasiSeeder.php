<?php

namespace Database\Seeders;

use App\Models\Reservasi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=> 'KKN Universitas',
                'email' => 'example@gmail.com',
                'phone' => '082312423423',
                'early_time' => '15.00',
                'end_time' => '20.00',
                'date' => '12-02-2024',
                'message' => 'Rapat pembukaan kegiatan KKN 2024',
                'people' => 12
            ],
        ];

        foreach ($data as $value) {
            Reservasi::insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'phone' => $value['phone'],
                'early_time' => $value['early_time'],
                'end_time' => $value['end_time'],
                'date' => $value['date'],
                'message' => $value['message'],
                'people' => $value['people'],
                'created_at' => Carbon::now(),
                'updated_at'  => Carbon::now()
            ]);
        }
    }
}
