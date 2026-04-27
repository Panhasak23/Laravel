@extends('layouts.app')

@section('content')
    <section class="form">
        <h2>Create Course</h2>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div class="field">
                <label for="student_id">Student</label>
                <select id="student_id" name="student_id" required>
                    <option value="">Select a student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @selected(old('student_id') == $student->id)>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="title">Title</label>
                <input id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="field">
                <label for="code">Code</label>
                <input id="code" name="code" value="{{ old('code') }}" required>
            </div>
            <div class="field">
                <label for="credit_hours">Credit Hours</label>
                <input id="credit_hours" type="number" name="credit_hours" value="{{ old('credit_hours', 3) }}" min="1" max="12" required>
            </div>
            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="actions">
                <button class="btn btn-primary" type="submit">Save Course</button>
                <a class="btn btn-soft" href="{{ route('courses.index') }}">Cancel</a>
            </div>
        </form>
    </section>
@endsection