<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    function index(Request $request){
        $courses = Course::all();
        $teachers = Teacher::all();
        return Inertia::render('Admin/Teachers',["teachers" => $teachers,"courses" => $courses]);
    }

    function store(Request $request){
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->about = $request->about;
        $teacher->email = $request->email;
        $teacher->course_id = $request->course;
        $teacher->save();

        return redirect("/admin/teachers");
    }
}
