<?php

namespace Database\Seeders;

use App\Models\Chef;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => null,
                'name' => 'Thomas Walker',
                'email' => 'thomas@gmail.com',
                'work' => 'Chef',
                'twitter' => null,
                'instagram' => null,
                'status' => 'active',
            ],
            [
                'image' => null,
                'name' => 'Sarah Mawarti',
                'email' => 'sarah@gmail.com',
                'work' => 'Kasir',
                'twitter' => null,
                'instagram' => null,
                'status' => 'active',
            ],
            [
                'image' => null,
                'name' => 'William Pertama',
                'email' => 'william@gmail.com',
                'work' => 'Cook',
                'twitter' => null,
                'instagram' => null,
                'status' => 'active',
            ],
        ];

        foreach ($data as $value) {
            Chef::insert([
                'image' => $value['image'],
                'name' => $value['name'],
                'email' => $value['email'],
                'work' => $value['work'],
                'twitter' => $value['twitter'],
                'instagram' => $value['instagram'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
