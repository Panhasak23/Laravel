@extends('layouts.app')

@section('content')
    <section class="form">
        <h2>Create Student</h2>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="field">
                <label for="name">Name</label>
                <input id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="field">
                <label for="phone">Phone</label>
                <input id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="field">
                <label for="age">Age</label>
                <input id="age" type="number" name="age" value="{{ old('age') }}" min="0">
            </div>
            <div class="actions">
                <button class="btn btn-primary" type="submit">Save Student</button>
                <a class="btn btn-soft" href="{{ route('students.index') }}">Cancel</a>
            </div>
        </form>
    </section>
@endsection