<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #1

        DB::table('students')->insert([
            'first_name' => 'Khaled',
            'last_name' => 'Hajjar',
            'class' => 'SD2A'
        ]);


         #2

         DB::table('students')->insert([
            'first_name' => 'Sid',
            'last_name' => 'Brinkmans',
            'class' => 'SD2A'
        ]);


         #3

         DB::table('students')->insert([
            'first_name' => 'Bashar',
            'last_name' => 'Abdin',
            'class' => 'SD2A'
        ]);
    }
}
