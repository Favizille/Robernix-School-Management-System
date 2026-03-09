<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    public function viewHome(){
        return view('pages.home');
    }

    public function viewLogin(){
        return view('pages.login');
    }

    public function viewContact(){
        return view('pages.contact');
    }
}
