<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => null,
                'name' => 'party ulang tahun',
                'price' => '500.000',
                'information' => 'Dekorasi yang sudah kita siapkan dengan sesuai keinginan Anda. Kami akan menyiapkan berbagai makanan seperti kue ulang tahun maupun pesananan yang Anda inginkan untuk teman Anda maupun keluarga Anda yang ulang tahun. Kami akan menyiapkan tempat dan membuat suasana se-meriah mungkin untuk menyambut Anda. Pesan sekarang apabila Anda membutuhkan tempat untuk merayakan ulang tahun teman maupun keluarga Anda'
            ],
            [
                'image' => null,
                'name' => 'party pribadi',
                'price' => '500.000',
                'information' => 'Anda dapat memesan event ditempat restoran kami untuk kebutuhan pribadi dengan menu yang lengkap, tempat yang nyaman, dan pelayanan yang ramah. Pesan sekarang apabila Anda membutukan tempat yang tenang dan tersedia berbagai menu dengan dilengkapi proyektor apabila dibutuhkan'
            ],
            [
                'image' => null,
                'name' => 'custom party',
                'price' => '500.000',
                'information' => 'Anda juga dapat memesan event custom ditempat kami dengan kebutuhan Anda. Anda dapat mengcustom tempat kami sesuai acara yang akan dilaksanakan. Kami akan menyiapkan alat-alat maupun desain dekorasi untuk acara Anda.'
            ],
        ];

        foreach ($data as $value) {
            Event::insert([
                'image' => $value['image'],
                'name' => $value['name'],
                'price' => $value['price'],
                'information' => $value['information'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
