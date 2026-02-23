@extends('layouts.app')

@section('content')
<h3 class="mb-4">Admin Dashboard</h3>

<div class="row">

    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>Total Students</h6>
            <h3>{{ \App\Models\User::where('role','student')->count() }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>Total Teachers</h6>
            <h3>{{ \App\Models\User::where('role','teacher')->count() }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>Total Courses</h6>
            <h3>{{ \App\Models\Course::count() }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>Active Term</h6>
            <h5>
                {{ \App\Models\Term::where('is_active', true)->first()->name ?? 'None' }}
            </h5>
        </div>
    </div>

</div>
@endsection