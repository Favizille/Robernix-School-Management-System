@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Academic Results</h2>
    
    @if($results->isEmpty())
        <p>No results available yet.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Term</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Test 1</th>
                    <th>Test 2</th>
                    <th>Exam</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $result->term->name }}</td>
                    <td>{{ $result->course->code }}</td>
                    <td>{{ $result->course->title }}</td>
                    <td>{{ $result->test_1 }}</td>
                    <td>{{ $result->test_2 }}</td>
                    <td>{{ $result->exam }}</td>
                    <td><strong>{{ $result->total }}</strong></td>
                    <td><span class="badge badge-primary">{{ $result->grade }}</span></td>
                    <td>{{ $result->position_in_course }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
