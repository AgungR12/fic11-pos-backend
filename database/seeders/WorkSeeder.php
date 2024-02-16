<?php

namespace Database\Seeders;

use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'work_code' => 'W2024041001',
                'name' => 'Chef'
            ],
            [
                'work_code' => 'W2024041002',
                'name' => 'Kasir'
            ],
            [
                'work_code' => 'W2024041003',
                'name' => 'Cook'
            ],
        ];

        foreach ($data as $value) {
            Work::insert([
                'work_code' => $value['work_code'],
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
