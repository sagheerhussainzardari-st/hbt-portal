<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class TeacherController extends Controller
{
    function index(Request $request){
        $courses = Course::all();
        $teachers = Teacher::all();
        $role = Auth::user()->roles[0]["name"] ?? '';
        return Inertia::render('Admin/Teachers',["teachers" => $teachers,"courses" => $courses,"role" => $role]);
    }

    function store(Request $request){
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->about = $request->about;
        $teacher->email = $request->email;
        $teacher->course_id = $request->course_id;
        $teacher->save();

        $user = new User();
        $user->name= $teacher->name;
        $user->email = $teacher->email;
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole('teacher');


        return redirect("/admin/teachers");
    }

    function update(Request $request){
        $teacher = Teacher::find($request->id);
        
        $teacher->name = $request->name;
        $teacher->about = $request->about;
        $teacher->email = $request->email;
        $teacher->course_id = $request->course_id;
        $teacher->save();

        return redirect("/admin/teachers");
    }

    function delete(Request $request,$id){
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect("/admin/teachers");
    }
}
