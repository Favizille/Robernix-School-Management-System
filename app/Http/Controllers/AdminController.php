<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Score;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalCourses = Course::count();
        $totalScores = Score::count();
        $activeTerm = Term::where('is_active', true)->first();
        $latestScores = Score::with(['student', 'course', 'term'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'totalScores',
            'activeTerm',
            'latestScores'
        ));
    }

    public function viewRegister()
    {
        return view('pages.register');
    }
}
