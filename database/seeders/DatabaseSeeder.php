<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techers = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@example.com',
                'phone'=>'0897654278',
                'address'=>'palembang',
                'gender'=>'male',
                'status'=>'active',
                ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@example.com',
                'phone'=>'081238764',
                'address'=>'palembang',
                'gender'=>'male',
                'status'=>'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 3',
                'email' => 'admin3@example.com',
                'phone'=>'086789636',
                'address'=>'lampung',
                'gender'=>'Female',
                'status'=>'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        foreach ($techers as $teacher){
            DB::table('techer')->insert($teacher);
        }
    }
}
