@extends('layouts.app')

@section('content')
    <section class="form">
        <h2>Edit Course</h2>
        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <label for="student_id">Student</label>
                <select id="student_id" name="student_id" required>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @selected(old('student_id', $course->student_id) == $student->id)>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="title">Title</label>
                <input id="title" name="title" value="{{ old('title', $course->title) }}" required>
            </div>
            <div class="field">
                <label for="code">Code</label>
                <input id="code" name="code" value="{{ old('code', $course->code) }}" required>
            </div>
            <div class="field">
                <label for="credit_hours">Credit Hours</label>
                <input id="credit_hours" type="number" name="credit_hours" value="{{ old('credit_hours', $course->credit_hours) }}" min="1" max="12" required>
            </div>
            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $course->description) }}</textarea>
            </div>
            <div class="actions">
                <button class="btn btn-primary" type="submit">Update Course</button>
                <a class="btn btn-soft" href="{{ route('courses.show', $course) }}">Cancel</a>
            </div>
        </form>
    </section>
@endsection