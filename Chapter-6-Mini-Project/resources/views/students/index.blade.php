@extends('layouts.app')

@section('title', 'Student List')

@section('content')
<div class="animate-fade-in">
    <h1 class="page-title">Student Directory</h1>
    
    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>GPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>
                                    <span class="badge badge-primary">{{ $student['id'] }}</span>
                                </td>
                                <td>
                                    <strong>{{ $student['name'] }}</strong>
                                </td>
                                <td>
                                    <a href="mailto:{{ $student['email'] }}" style="color: #667eea; text-decoration: none;">
                                        {{ $student['email'] }}
                                    </a>
                                </td>
                                <td>{{ $student['phone'] }}</td>
                                <td>{{ $student['course'] }}</td>
                                <td>
                                    @switch($student['year'])
                                        @case('Freshman')
                                            <span class="badge badge-info">{{ $student['year'] }}</span>
                                            @break
                                        @case('Sophomore')
                                            <span class="badge badge-warning">{{ $student['year'] }}</span>
                                            @break
                                        @case('Junior')
                                            <span class="badge badge-primary">{{ $student['year'] }}</span>
                                            @break
                                        @case('Senior')
                                            <span class="badge badge-success">{{ $student['year'] }}</span>
                                            @break
                                        @default
                                            <span class="badge badge-primary">{{ $student['year'] }}</span>
                                    @endswitch
                                </td>
                                <td>
                                    <strong style="color: {{ $student['gpa'] >= 3.5 ? '#28a745' : ($student['gpa'] >= 3.0 ? '#ffc107' : '#dc3545') }}">
                                        {{ $student['gpa'] }}
                                    </strong>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

