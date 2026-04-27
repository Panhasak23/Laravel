@extends('layouts.app')

@section('content')
    <section class="form">
        <h2>Edit Student</h2>
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <label for="name">Name</label>
                <input id="name" name="name" value="{{ old('name', $student->name) }}" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $student->email) }}" required>
            </div>
            <div class="field">
                <label for="phone">Phone</label>
                <input id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
            </div>
            <div class="field">
                <label for="age">Age</label>
                <input id="age" type="number" name="age" value="{{ old('age', $student->age) }}" min="0">
            </div>
            <div class="actions">
                <button class="btn btn-primary" type="submit">Update Student</button>
                <a class="btn btn-soft" href="{{ route('students.show', $student) }}">Cancel</a>
            </div>
        </form>
    </section>
@endsection