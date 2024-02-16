<?php

namespace Database\Seeders;

use App\Models\Customers;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name_customer' => 'Agung Ramadhan',
                'email' => '12agungramadhan@gmail.com',
                'job' => null,
                'subject' => 'Aplikasi Menarik',
                'type' => 'pos',
                'message' => 'Aplikasi dengan desain yang cocok dengan kebutuhan saya untuk menjalankan bisnis saya'
            ],
            [
                'name_customer' => 'Iqbal Hilmi Raihan',
                'email' => 'iqbalhilmi@gmail.com',
                'job' => null,
                'subject' => 'Aplikasi terbaik',
                'type' => 'pos',
                'message' => 'Saya baru pertama kali membeli aplikasi untuk bisnis saya, saya mencoba membeli aplikasi POS ini
                dan sekarang dapat membantu bisnis saya'
            ],
            [
                'name_customer' => 'Muhammad Habib',
                'email' => 'muhammadhabib@gmail.com',
                'job' => null,
                'subject' => 'Aplikasi dengan fitur yang terbaik',
                'type' => 'pos',
                'message'=> 'Aplikasi POS ini menarik buat saya, dan setelah menggunakan aplikasi ini, bisnis saya menjadi lebih mudah
                untuk customer dan untuk saya sendiri'
            ],
            [
                'name_customer' => 'Fajar Brandon',
                'email' => 'Fajar@gmail.com',
                'job' => 'freelancer',
                'subject' => 'Restoran yang bagus',
                'type' => 'resto',
                'message'=> 'Restoran ini sangat bagus untuk bersantai sambil mengerjakan pekerjaan dengan menu dengan harga terjangkau'
            ],
            [
                'name_customer' => 'Jena Karmila',
                'email' => 'jena@gmail.com',
                'job' => 'store owner',
                'subject' => 'Menu Lengkap',
                'type' => 'resto',
                'message'=> 'Menu di restoran ini sangat banyak, sangat lengkap sampai saya bingung untuk memilihnya karena semuanya enak ..'
            ],
            [
                'name_customer' => 'James Sukandar',
                'email' => 'james@gmail.com',
                'job' => 'designer',
                'subject' => 'Enak Buat Keluarga',
                'type' => 'resto',
                'message'=> 'Tempat ini sangat cocok untuk mengajak keluarga terdekat, makan bersama dengan keluarga dengan canda tawa ..'
            ],
            [
                'name_customer' => 'Joko Pratama',
                'email' => 'joko@gmail.com',
                'job' => 'ceo',
                'subject' => 'Cocok Untuk Acara Pribadi',
                'type' => 'resto',
                'message'=> 'Restoran ini menyediakan kebutuhan untuk acara kantor maupun acara-acara formal dengan menu yang lengkap'
            ],
        ];

        foreach ($data as $value) {
            Customers::insert([
                'name_customer' => $value['name_customer'],
                'email' => $value['email'],
                'subject' => $value['subject'],
                'job' => $value['job'],
                'message' => $value['message'],
                'type' => $value['type'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
