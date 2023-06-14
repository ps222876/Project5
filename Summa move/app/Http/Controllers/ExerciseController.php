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
        $request->user()->currentAccessToken()->delete();
        $response = [
            'success' => true,
            'data'    => Exercise::create($request->all()),
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        return $exercise;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        Log::info('update exercises', ['ip' => $request->ip(), 'old' => $exercise, 'new' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'instruction_nl' => 'required',
        ]);
        if ($validator->fails()) {
            Log::error("exercise can not be updated");
            return response('{"Foutmelding":"Data not correct"}', 400)->header('Content-Type', 'application/json');
        }


        $request->user()->currentAccessToken()->delete();
        $exercise->update($request->all());
        $response = [
            'success' => true,
            'data'    =>  $exercise,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Exercise $exercise)
    {
        Log::info('delete videos', ['data' => $exercise]);
        $request->user()->currentAccessToken()->delete();
        $exercise->delete(); 
        $response = [
            'success' => true,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);
    }
}
