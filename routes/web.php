<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get("/create_roles",function(){
    $role = Role::create(['name' => 'student']);
    $role = Role::create(['name' => 'teacher']);
    $role = Role::create(['name' => 'admin']);
});

Route::get('/dashboard', function () {
    $role = Auth::user()->roles[0]["name"] ?? '';
    $teachers = Teacher::all();
    $students = Student::all();
    $courses = Course::all();

    $route = $role == 'admin' ? 'Admin/Dashboard' : ($role == 'student' ? 'Student/Dashboard' : 'Teacher/Dashboard');
    
    if($role == "teacher"){
        $teacher  = Teacher::where(["email" =>  Auth::user()->email])->first();
        $students = Student::where(["course_id" => $teacher->course_id])->get();
    }
    
    return Inertia::render($route,[
        "role" => $role,
        "total_teachers" => count($teachers) ?? 0,
        "total_students" => count($students) ?? 0,
        "total_courses" => count($courses) ?? 0
        
    ]);
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function(){
    Route::prefix('admin')->group(function () {
        Route::get("teachers",[TeacherController::class,'index'])->name('admin.teachers');
        Route::post("teachers/add",[TeacherController::class,'store'])->name('admin.teachers.add');
        Route::post("teachers/update",[TeacherController::class,'update'])->name('admin.teachers.update');
        Route::post("teachers/delete/{id}",[TeacherController::class,'delete'])->name('admin.teachers.delete');

        Route::get("students",[StudentController::class,'index'])->name('admin.students');
        Route::post("students/add",[StudentController::class,'store'])->name('admin.students.add');
        Route::post("students/update",[StudentController::class,'update'])->name('admin.students.update');
        Route::post("students/delete/{id}",[StudentController::class,'delete'])->name('admin.students.delete');
    });
});

Route::middleware('teacher')->group(function(){
    Route::prefix('teacher')->group(function () {
        Route::get("students",[StudentController::class,'index'])->name('teacher.students');
        // Route::post("students/add",[StudentController::class,'store'])->name('admin.students.add');
        // Route::post("students/update",[StudentController::class,'update'])->name('admin.students.update');
        // Route::post("students/delete/{id}",[StudentController::class,'delete'])->name('admin.students.delete');
    });
});


require __DIR__.'/auth.php';
