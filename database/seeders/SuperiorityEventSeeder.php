<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\SuperiorityEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperiorityEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'subject' => 'Menu Lengkap',
                'description' => 'Kami menyediakan menu makanan dan minuman yang beragam dari bahan-bahan yang berkualitas tinggi. Dan kami menyediakan juga beragam cemilan',
                'information' => 'resto page',
                'status' => 'active'
            ],
            [
                'subject' => 'Pelayanan dan Pesan Cepat',
                'description' => 'Kami melayani pelanggan secara langsung maupun online. Anda dapat memesan secara cepat lewat website kami maupun lewat apps yang tersedia di playstore. Kami akan melayani dengan sepenuh hati, sesuai permintaan anda',
                'information' => 'resto page',
                'status' => 'active'
            ],
            [
                'subject' => 'Live Music dan Spot Foto',
                'description' => 'Anda dapat menikmati pemandangan yang indah, menikmati live music dan spot foto dengan background pemandangan dari tempat kami. Kami akan melayani dengan sepenuh hati apabila Anda mendatangi tempat kami',
                'information' => 'resto page',
                'status' => 'active'
            ],
        ];

        foreach ($data as $value) {
            SuperiorityEvent::insert([
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
