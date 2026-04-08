@extends('Layouts.admin')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1 section-title">Enter Student Scores</h1>
            <p class="text-muted">Record a student's score for the current term and selected course.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to dashboard
        </a>
    </div>

    <div class="card card-custom p-4 mb-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('scores.store') }}">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">Student</label>
                    <select class="form-select" name="student_id" required>
                        <option value="">Select student</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Course</label>
                    <select class="form-select" name="course_id" required>
                        <option value="">Select course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Term</label>
                    <select class="form-select" name="term_id" required>
                        <option value="">Select term</option>
                        @foreach($terms as $term)
                            <option value="{{ $term->id }}" {{ old('term_id') == $term->id ? 'selected' : '' }}>{{ $term->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">Test 1 (20)</label>
                    <input type="number" name="test_1" class="form-control" min="0" max="20" value="{{ old('test_1') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Test 2 (20)</label>
                    <input type="number" name="test_2" class="form-control" min="0" max="20" value="{{ old('test_2') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Exam (60)</label>
                    <input type="number" name="exam" class="form-control" min="0" max="60" value="{{ old('exam') }}" required>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save Score</button>
            </div>
        </form>
    </div>
@endsection
