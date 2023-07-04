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
        DB::table('exercises')->insert([
            'name' => 'Squat',
            'instruction_nl' => 'test_nl',
            'instruction_en' => 'test_en',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        #1
        // DB::table('exercises')->insert([
        //     'name' => 'Squat',
        //     'instruction_nl' => '1. Sta met je voeten op schouderbreedte uit elkaar en je tenen iets naar buiten gedraaid.' .
        //      "\n 2. Span je buikspieren aan en houd je rug recht gedurende de oefening." .
        //      "\n 3. Buig je knieën en duw je heupen naar achteren alsof je in een stoel gaat zitten" .
        //      "\n 4. Houd je knieën in lijn met je tenen en zak door tot je dijen parallel zijn aan de vloer. " .
        //      "\n 5. Duw door je hielen en strek je benen om terug te keren naar de startpositie. ",
             
        //     'instruction_en' => '1.	Stand with your feet shoulder-width apart and your toes slightly turned out.' .
        //     "\n 2.	Engage your core muscles and keep your back straight throughout the exercise." .
        //     "\n 3.	Lower your body by bending your knees and pushing your hips back as you are sitting in a chair." .
        //     "\n 4.	Keep your knees in line with your toes and lower your body until your thighs are parallel to the floor." .
        //     "\n 5.	Engage your core muscles and keep your back straight throughout the exercise." ,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

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
