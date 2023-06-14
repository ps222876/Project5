<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Log::info(
            'Exercises index',
            [
                'ip' => $request->ip(),
                'data' => $request->all()
            ]
        );

        if ($request->has('name')) {
            $data = Exercise::where('name', 'like', '%' . $request->title . '%')->get();
        } else if ($request->has('sort')) {
            $data =  Exercise::orderBy($request->sort)->get();
        } else {
           return $data = Exercise::all();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exercise = Exercise::find($id); // find = zoek op ID
        return(['exercise' => $exercise]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
