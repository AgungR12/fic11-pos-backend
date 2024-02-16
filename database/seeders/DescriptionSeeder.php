<?php

namespace Database\Seeders;

use App\Models\Description;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'package_description' => 'Dashboard admin dan Aplikasi POS',
                'status' => 'active',
                'package' => 'All Package'
            ],
            [
                'package_description' => 'Pembayaran bisa menggunakan qris dan tunai',
                'status' => 'active',
                'package' => 'Small Package'
            ],
            [
                'package_description' => 'Garansi 5 bulan mulai dari pembelian dan gratis servis selama 5 bulan',
                'status' => 'active',
                'package' => 'Small Package'
            ],
            [
                'package_description' => '5 pengoptimalan gratis',
                'status' => 'active',
                'package' => 'Small Package'
            ],
            [
                'package_description' => 'Cetak nota dengan menggunakan print bluetooth',
                'status' => 'active',
                'package' => 'All Package'
            ],
            [
                'package_description' => 'Server Local',
                'status' => 'active',
                'package' => 'All Package'
            ],
            [
                'package_description' => 'Pembayaran bisa menggunakan qris, tunai dan shoopey pay',
                'status' => 'active',
                'package' => 'Medium Package'
            ],
            [
                'package_description' => 'Garansi 8 bulan mulai dari pembelian dan gratis servis selama 8 bulan',
                'status' => 'active',
                'package' => 'Medium Package'
            ],
            [
                'package_description' => '8 pengoptimalan gratis',
                'status' => 'active',
                'package' => 'Medium Package'
            ],
            [
                'package_description' => 'Pembayaran bisa menggunakan qris, tunai, shoopey pay dan gopay',
                'status' => 'active',
                'package' => 'Big Package'
            ],
            [
                'package_description' => 'Garansi 1 tahun mulai pembelian dan gratis servis selama 1 tahun',
                'status' => 'active',
                'package' => 'Big Package'
            ],
            [
                'package_description' => '12 pengoptimalan gratis',
                'status' => 'active',
                'package' => 'Big Package'
            ],
            [
                'package_description' => 'Domain dengan Hosting dan Server Local',
                'status' => 'active',
                'package' => 'Big Package'
            ],
        ];

        foreach ($data as $value) {
            Description::insert([
                'package_description' => $value['package_description'],
                'status' => $value['status'],
                'package' => $value['package'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
