<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\SpecialPackage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Paket Nasi Special',
                'description' => 'Paket yang menyediakan nasi, ikan, tahu/tempe, sambal, dan es teh. Paket ini untuk 5 porsi',
                'price' => 100000,
                'stock' => 20,
                'image' => null
            ],
            [
                'name' => 'Paket Ikan Gurami Special',
                'description' => 'Paket yang menyediakan nasi, ikan gurami, tahu/tempe, sambal, dan es teh. Paket ini untuk 5 porsi',
                'price' => 150000,
                'stock' => 20,
                'image' => null
            ],
            [
                'name' => 'Paket Ingkung Special',
                'description' => 'Paket yang menyediakan nasi, 1 ayam ingkung, tahu/tempe, sambal, dan es teh. Paket ini untuk 8 porsi',
                'price' => 200000,
                'stock' => 20,
                'image' => null
            ],
        ];

        foreach ($data as $value) {
            SpecialPackage::insert([
                'name' => $value['name'],
                'description' => $value['description'],
                'price' => $value['price'],
                'stock' => $value['stock'],
                'image' => $value['image'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
