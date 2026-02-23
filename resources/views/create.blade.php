@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enter Student Scores</h2>

    <form method="POST" action="{{ route('scores.store') }}">
        @csrf

        <div>
            <label>Select Course:</label>
            <select name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>

            <label>Select Term:</label>
            <select name="term_id" required>
                @foreach($terms as $term)
                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                @endforeach
            </select>
        </div>

        <br>

        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Test 1 (20)</th>
                    <th>Test 2 (20)</th>
                    <th>Exam (60)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>
                            {{ $student->name }}
                            <input type="hidden" name="students[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                        </td>
                        <td>
                            <input type="number" name="students[{{ $student->id }}][test_1]" max="20" min="0">
                        </td>
                        <td>
                            <input type="number" name="students[{{ $student->id }}][test_2]" max="20" min="0">
                        </td>
                        <td>
                            <input type="number" name="students[{{ $student->id }}][exam]" max="60" min="0">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <button type="submit">Submit Scores</button>
    </form>
</div>
@endsection