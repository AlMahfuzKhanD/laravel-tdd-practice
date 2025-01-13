<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return response()->json($students);
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'roll' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = new Student();
        $student->roll = $request->roll;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        return response()->json('success',200);
    }

    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return response()->json($student);
    }

    public function edit($id){
        $student = Student::find($id);
        return response()->json($student);
    }

   
}
