<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Shift;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class StudentController extends Controller
{
    function index(Request $request){
        $courses = Course::all();
        $shifts = Shift::all();
        $students = Student::all();
        $role = Auth::user()->roles[0]["name"] ?? '';
        if($role == "teacher"){
            $teacher  = Teacher::where(["email" =>  Auth::user()->email])->first();
            $students = Student::where(["course_id" => $teacher->course_id])->get();
        }
        return Inertia::render('Admin/Students',["students" => $students,"courses" => $courses,'shifts' => $shifts,"role" => $role]);
    }

    function store(Request $request){
        $student = new Student();
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->emergency_phone = $request->emergency_phone;
        $student->shift_id = $request->shift_id;
        $student->cnic = $request->cnic;
        $student->education = $request->education;
        $student->course_id = $request->course_id;
        $student->save();

        $user = new User();
        $user->name= $student->name;
        $user->email = $student->email;
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole('student');

        return redirect("/admin/students");
    }

    function update(Request $request){
        
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->emergency_phone = $request->emergency_phone;
        $student->shift_id = $request->shift_id;
        $student->cnic = $request->cnic;
        $student->education = $request->education;
        $student->course_id = $request->course_id;
        $student->save();

        return redirect("/admin/students");
    }

    function delete(Request $request,$id){
        $student = Student::find($id);
        $student->delete();
        return redirect("/admin/students");
    }

    
}
