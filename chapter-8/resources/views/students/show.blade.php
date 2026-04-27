@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Score:</strong> {{ $student->score }}</p>
    <p class="muted"><strong>Created:</strong> {{ $student->created_at }}</p>

    <div class="actions" style="margin-top: 14px;">
        <a class="btn btn-gray" href="{{ route('students.index') }}">Back</a>
        <a class="btn" href="{{ route('students.edit', $student) }}">Edit</a>
    </div>
@endsection
