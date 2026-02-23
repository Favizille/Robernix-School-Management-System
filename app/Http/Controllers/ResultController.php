<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Score;
use App\Models\Term;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        $courses = Course::all();
        // Fetch some recent scores for display
        $scores = Score::with(['student', 'course'])->latest()->take(50)->get();
        
        return view('admin.results.index', compact('terms', 'courses', 'scores'));
    }

    public function generatePositions(Request $request)
    {
        $termId = $request->term_id;
        $courseId = $request->course_id;

        // Get all scores for this course and term, ordered by total desc
        $scores = Score::where('term_id', $termId)
                       ->where('course_id', $courseId)
                       ->orderBy('total', 'desc')
                       ->get();

        $rank = 1;
        foreach ($scores as $score) {
            $score->position_in_course = $rank++;
            $score->save();
        }

        return redirect()->back()->with('success', 'Positions generated successfully.');
    }

    public function togglePublish(Request $request)
    {
        $score = Score::find($request->score_id);
        if ($score) {
            $score->is_published = !$score->is_published;
            $score->save();
        }

        return redirect()->back()->with('success', 'Result visibility updated.');
    }

    public function export(Request $request)
    {
        // Logic to export to Excel would go here using Maatwebsite/Laravel-Excel
        return redirect()->back()->with('info', 'Export functionality requires Maatwebsite/Laravel-Excel package.');
    }
}
