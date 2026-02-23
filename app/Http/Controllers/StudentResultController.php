<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class StudentResultController extends Controller
{
    public function show()
    {
        $student = Auth::user();
        // Only show published results
        $results = Score::where('student_id', $student->id)
                        ->where('is_published', true)
                        ->with(['course', 'term'])
                        ->get();

        return view('student.results.show', compact('results'));
    }
}
