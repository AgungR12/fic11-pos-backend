<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role' => 'admin',
                'level' => 'Admin'
            ],
            [
                'role' => 'staff',
                'level' => 'Staff'
            ],
            [
                'role' => 'user',
                'level' => 'User',
            ],
        ];

        foreach ($data as $value) {
            Role::insert([
                'role' => $value['role'],
                'level' => $value['level'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
