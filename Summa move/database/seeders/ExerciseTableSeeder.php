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
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        #2
        DB::table('exercises')->insert([
            'name' => 'Push-up',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #3
        DB::table('exercises')->insert([
            'name' => 'Dip',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #4

        DB::table('exercises')->insert([
            'name' => 'Plank',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



        #5
        DB::table('exercises')->insert([
            'name' => 'Paardentrap',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



        #6

        DB::table('exercises')->insert([
            'name' => 'Mountain climber',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #7

        DB::table('exercises')->insert([
            'name' => 'Burpee',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #8

        DB::table('exercises')->insert([
            'name' => 'Lunge',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #9

        DB::table('exercises')->insert([
            'name' => 'Wall sit',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        #10

        DB::table('exercises')->insert([
            'name' => 'Crunch',
            'instructon_nl' => 'test_nl',
            'instructon_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
