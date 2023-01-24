<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send_student_message(Request $request){
        dd($request->all());
    }
}
