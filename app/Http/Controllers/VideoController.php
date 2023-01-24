<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class VideoController extends Controller
{
    function index(Request $request){
        $role = Auth::user()->roles[0]["name"] ?? '';
        
        return Inertia::render('Teacher/Videos',["role" => $role]);
    }
}
