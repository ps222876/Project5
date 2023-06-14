<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Log::info(
            'Students index',
            [
                'ip' => $request->ip(),
                'data' => $request->all()
            ]
        );

        if ($request->has('first_name')) {
            $data = Student::where('first_name', 'like', '%' . $request->title . '%')->get();
        } else if ($request->has('sort')) {
            $data =  Student::orderBy($request->sort)->get();
        } else {
           return $data = Student::all();
        }

        // return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $response = [
            'success' => true,
            'data'    => Student::create($request->all()),
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);
    }





    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::find($id); // find = zoek op ID
        return(['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        Log::info('update students', ['ip' => $request->ip(), 'old' => $student, 'new' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'class' => 'required',
        ]);
        if ($validator->fails()) {
            Log::error("student can not be updated");
            return response('{"Foutmelding":"Data not correct"}', 400)->header('Content-Type', 'application/json');
        }


        $request->user()->currentAccessToken()->delete();
        $student->update($request->all());
        $response = [
            'success' => true,
            'data'    =>  $student,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Student $student)
    {
        Log::info('delete students', ['data' => $student]);
        $request->user()->currentAccessToken()->delete();
        $student->delete(); 
        $response = [
            'success' => true,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);  
    }
}
