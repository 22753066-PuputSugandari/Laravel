<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Students')->insert([
                'name' => 'Student1',
                'email' => 'Student1@example.com',
                'phone'=>'08976542787',
                'class'=>'9',
                'address'=>'Rajabasa',
                'gender'=>'male',
                'status'=>'active',
                'created_at' => now(),
                'updated_at' => now(),
    ]);
}
}