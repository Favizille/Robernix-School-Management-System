@extends('Layouts.admin')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1">Overview</h1>
            <p class="text-muted">A quick overview of students, teachers, courses and the current academic term.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.results') }}" class="btn btn-primary">Manage Results</a>
            <a href="{{ route('scores.create') }}" class="btn btn-outline-secondary">Enter Scores</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="text-uppercase text-secondary mb-1">Students</h6>
                        <h2 class="mb-0">{{ $totalStudents }}</h2>
                    </div>
                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <p class="text-muted mb-0">Total registered students</p>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="text-uppercase text-secondary mb-1">Teachers</h6>
                        <h2 class="mb-0">{{ $totalTeachers }}</h2>
                    </div>
                    <div class="avatar bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                </div>
                <p class="text-muted mb-0">Current teaching staff</p>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="text-uppercase text-secondary mb-1">Courses</h6>
                        <h2 class="mb-0">{{ $totalCourses }}</h2>
                    </div>
                    <div class="avatar bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                </div>
                <p class="text-muted mb-0">Active course catalogue</p>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="text-uppercase text-secondary mb-1">Scores</h6>
                        <h2 class="mb-0">{{ $totalScores }}</h2>
                    </div>
                    <div class="avatar bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                </div>
                <p class="text-muted mb-0">Score entries recorded</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-lg-8">
            <div class="card card-custom p-4">
                <h5 class="mb-3">Latest Fees</h5>
                @if($latestScores->isEmpty())
                    <div class="alert alert-secondary mb-0">No recent transactions to display.</div>
                @else
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Course</th>
                                    <th>Term</th>
                                    <th>Total</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestScores as $score)
                                    <tr>
                                        <td>{{ $score->student?->name ?? 'Unknown' }}</td>
                                        <td>{{ $score->course?->name ?? 'Unknown' }}</td>
                                        <td>{{ $score->term?->name ?? 'Unknown' }}</td>
                                        <td>{{ $score->total ?? ($score->test_1 + $score->test_2 + $score->exam) }}</td>
                                        <td>{{ $score->grade ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-custom p-4 mb-4">
                <h5 class="mb-3">Active Term</h5>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="mb-1">{{ $activeTerm->name ?? 'None' }}</h2>
                        <p class="text-muted mb-0">Current academic term</p>
                    </div>
                    <div class="badge bg-primary fs-6">Active</div>
                </div>
            </div>
            <div class="card card-custom p-4">
                <h5 class="mb-3">Quick Actions</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.results') }}" class="btn btn-outline-primary">View all results</a>
                    <a href="{{ route('scores.create') }}" class="btn btn-outline-secondary">Add new score</a>
                    <a href="{{ route('admin.register') }}" class="btn btn-outline-success">Register admin</a>
                </div>
            </div>
        </div>
    </div>
@endsection