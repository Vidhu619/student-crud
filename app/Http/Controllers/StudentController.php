<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    
    public function list()
    {
        $students = Student::latest()->get();

        return response()->json([
            'data' => $students
        ]);
    }

    // add new student
    public function add(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Student created successfully'
        ]);
    }

    // Update student
    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Student updated successfully'
        ]);
    }

    // Delete student
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Student deleted successfully'
        ]);
    }
}
