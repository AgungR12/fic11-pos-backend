<?php

namespace Database\Seeders;

use App\Models\Superiority;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'subject' => 'Mudah Dikelola',
                'description' => 'POS menyediakan berbagai fitur-fitur yang memudahkan Anda dalam mengelola produk Anda. Dan dilengkapi fitur printer bluetooth yang memudahkan Anda dalam mencetak nota pembelian dari Customer',
                'information' => 'landing page',
                'status' => 'active'
            ],
            [
                'subject' => 'Dapat Pembayaran dengan Mudah',
                'description' => 'Aplikasi ini dilengkapi dengan metode pembayaran cash maupun qris yang dapat memudahkan customer dalam pembelian. Dan dengan mudah dalam mencetak nota pembelian dengan printer bluetooth',
                'information' => 'landing page',
                'status' => 'active'
            ],
            [
                'subject' => 'Pesan Cepat',
                'description' => 'Dengan dilengkapi berbagai fitur, maka customer dapat dengan mudah membeli produk Anda, dan Anda dengan mudah melayani customer dengan menggunakan aplikasi ini',
                'information' => 'landing page',
                'status' => 'active'
            ],
        ];


        foreach ($data as $value) {
            Superiority::insert([
                'subject' => $value['subject'],
                'description' => $value['description'],
                'information' => $value['information'],
                'status' => $value['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
