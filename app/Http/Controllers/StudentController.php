<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required',
            'section' => 'required',
        ]);

        return Student::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $student = Student::findOrFail($id);
            return response()->json($student);

        }catch (Exception $e) {

            return $e->getMessage();            

        }

        // if (!$student) {
        //     // Return a JSON error response if the student is not found
        //     return response()->json([
        //         'error' => 'Student not found',
        //     ], 404);
        // }
    
        // return response()->json($student, 200);
    }
    // public function show(Student $student)
    // {
    //     return $student;
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validated = $request->validate([
    //         'firstname' => 'required|max:255',
    //         'lastname' => 'required',
    //         'section' => 'required',
    //     ]);

    //     $result = Student::where('id', $id)->update($validated);

    //     return $result;
    // }
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required',
            'section' => 'required',
        ]);

        $result = $student->update($validated);

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            Student::findOrFail($id)->delete();
            return response()->json(["message" => "The student record successfully deleted!"]);

        }catch (Exception $e) {

            return $e->getMessage();            

        }
    }
}
