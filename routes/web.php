<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
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
    $route = $role == 'admin' ? 'Admin/Dashboard' : ($role == 'student' ? 'Student/Dashboard' : 'Teacher/Dashboard');
    return Inertia::render($route);
    
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
    });
});


require __DIR__.'/auth.php';
