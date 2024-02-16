<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.634678864985!2d110.21892460603233!3d-7.756128418922125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af12f50a71bb3%3A0x4a8e79d98155d3e2!2sPakelan%2C%20Sumberarum%2C%20Kec.%20Moyudan%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1706280310701!5m2!1sid!2sid"
                    width="1150" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'address' => 'Pingitan',
                'complete_address' => 'Jln. Godean Pingitan Sumber Arum Moyudan Sleman DIY',
                'phone' => '082361726162',
                'email' => 'programming@gmail.com'
            ],
        ];

        foreach ($data as $value) {
            Profile::insert([
                'google_maps' => $value['google_maps'],
                'address' => $value['address'],
                'complete_address' => $value['complete_address'],
                'phone' => $value['phone'],
                'email' => $value['email']
            ]);
        }
    }
}
