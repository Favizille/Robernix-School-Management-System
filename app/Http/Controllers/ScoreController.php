<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Score;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function create()
    {
        // Assuming teacher is logged in and we get their courses
        $teacher = Auth::user();
        // In a real app, you'd filter courses by what the teacher is assigned to
        $courses = Course::all(); 
        $students = User::where('role', 'student')->get();
        $terms = Term::where('is_active', true)->get();

        return view('create', compact('courses', 'students', 'terms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'term_id' => 'required|exists:terms,id',
            'test_1' => 'required|numeric|max:20',
            'test_2' => 'required|numeric|max:20',
            'exam' => 'required|numeric|max:60',
        ]);

        $score = Score::updateOrCreate(
            [
                'student_id' => $request->student_id,
                'course_id' => $request->course_id,
                'term_id' => $request->term_id,
            ],
            [
                'test_1' => $request->test_1,
                'test_2' => $request->test_2,
                'exam' => $request->exam,
            ]
        );

        $score->calculateResult();

        return redirect()->back()->with('success', 'Score added successfully.');
    }

    public function viewDashboard()
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
}
