@extends('layout')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px;">Add New Student</h2>
    
    <a href="{{ route('students.index') }}" class="back-link">← Back to All Students</a>
    
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
            @error('phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" name="course" id="course" value="{{ old('course') }}">
            @error('course')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="year">Year</label>
            <select name="year" id="year">
                <option value="">Select Year</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('year')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="gpa">GPA</label>
            <input type="number" name="gpa" id="gpa" step="0.01" min="0" max="5" value="{{ old('gpa') }}">
            @error('gpa')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-success">Create Student</button>
            <a href="{{ route('students.index') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>
@endsection

