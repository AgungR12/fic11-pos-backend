<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'package_name' => 'Small Package',
                'price' => '2',
                'nominal' => 'Juta',
                'warranty' => '5 bulan',
                'status' => 'active'
            ],
            [
                'package_name' => 'Medium Package',
                'price' => '5',
                'nominal' => 'Juta',
                'warranty' => '8 bulan',
                'status' => 'active'
            ],
            [
                'package_name' => 'Big Package',
                'price' => '10',
                'nominal' => 'Juta',
                'warranty' => '1 tahun',
                'status' => 'active'
            ],
        ];

        foreach ($data as $value) {
            Pricing::insert([
                'package_name' => $value['package_name'],
                'price' => $value['price'],
                'nominal' => $value['nominal'],
                'warranty' => $value['warranty'],
                'status' => $value['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
