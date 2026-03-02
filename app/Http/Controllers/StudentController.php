<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function viewHome(){
        return view('pages.home');
    }
}
