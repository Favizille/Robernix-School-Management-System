@extends('layouts.app')

@section('content')
<h3 class="mb-4">Results Management</h3>

<div class="card card-custom p-4 mb-4">
    <form method="POST" action="{{ route('admin.results.positions') }}" class="row g-3">
        @csrf
        <div class="col-md-4">
            <select name="term_id" class="form-select" required>
                <option value="">Select Term</option>
                @foreach($terms as $term)
                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <select name="course_id" class="form-select" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <button class="btn btn-primary w-100">Generate Positions</button>
        </div>
    </form>
</div>

<div class="card card-custom p-4">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                <tr>
                    <td>{{ $score->student->name }}</td>
                    <td>{{ $score->course->name }}</td>
                    <td>{{ $score->total }}</td>
                    <td>{{ $score->grade }}</td>
                    <td>{{ $score->position_in_course }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.results.publish') }}">
                            @csrf
                            <input type="hidden" name="score_id" value="{{ $score->id }}">
                            <button class="btn btn-sm {{ $score->is_published ? 'btn-danger' : 'btn-success' }}">
                                {{ $score->is_published ? 'Unpublish' : 'Publish' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.results.export') }}" class="btn btn-success mt-3">
        Export to Excel
    </a>
</div>
@endsection