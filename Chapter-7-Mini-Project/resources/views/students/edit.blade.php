@extends('layout')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px;">Edit Student</h2>
    
    <a href="{{ route('students.index') }}" class="back-link">← Back to All Students</a>
    
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}">
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $student->phone) }}">
            @error('phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" name="course" id="course" value="{{ old('course', $student->course) }}">
            @error('course')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="year">Year</label>
            <select name="year" id="year">
                <option value="">Select Year</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ old('year', $student->year) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('year')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="gpa">GPA</label>
            <input type="number" name="gpa" id="gpa" step="0.01" min="0" max="5" value="{{ old('gpa', $student->gpa) }}">
            @error('gpa')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-success">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>
@endsection

