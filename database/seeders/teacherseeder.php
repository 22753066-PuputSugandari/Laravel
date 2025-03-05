<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class teacherseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Guru',
                'email' => 'guru1@example.com',
                'phone' => '0897654278',
                'address' => 'jakarta',
                'gender' => 'female',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data techer
        foreach ($teachers as $teacher) {
            DB::table('techer')->insert($teacher);
        }

    }
}
