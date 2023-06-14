<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #1
        DB::table('exercises')->insert([
            'name' => 'Squat',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        #2
        DB::table('exercises')->insert([
            'name' => 'Push-up',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #3
        DB::table('exercises')->insert([
            'name' => 'Dip',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #4

        DB::table('exercises')->insert([
            'name' => 'Plank',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



        #5
        DB::table('exercises')->insert([
            'name' => 'Paardentrap',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



        #6

        DB::table('exercises')->insert([
            'name' => 'Mountain climber',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #7

        DB::table('exercises')->insert([
            'name' => 'Burpee',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #8

        DB::table('exercises')->insert([
            'name' => 'Lunge',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #9

        DB::table('exercises')->insert([
            'name' => 'Wall sit',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #10

        DB::table('exercises')->insert([
            'name' => 'Crunch',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
