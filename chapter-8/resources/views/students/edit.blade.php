@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $student->name) }}" required>
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $student->email) }}" required>
        </div>

        <div class="field">
            <label for="score">Score</label>
            <input id="score" name="score" type="number" value="{{ old('score', $student->score) }}" min="0" max="100" required>
        </div>

        <div class="actions">
            <button type="submit" class="btn">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-gray">Cancel</a>
        </div>
    </form>
@endsection
