<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Facebook',
                'url' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Instagram',
                'url' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Twiiter',
                'url' => null,
                'status' => 'active'
            ],
            [
                'name' => 'Tiktok',
                'url' => null,
                'status' => 'active'
            ],
        ];

        foreach ($data as $value) {
            SocialMedia::insert([
                'name' => $value['name'],
                'url' => $value['url'],
                'status' => $value['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
