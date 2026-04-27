@extends('layouts.app')

@section('content')
    <section class="card" style="margin-bottom: 18px;">
        <div class="actions" style="justify-content: space-between; align-items: center;">
            <div>
                <h2 style="margin-bottom: 6px;">{{ $course->title }}</h2>
                <p class="muted" style="margin: 0;">Course profile and parent student relationship.</p>
            </div>
            <div class="actions">
                <a class="btn btn-soft" href="{{ route('courses.edit', $course) }}">Edit</a>
                <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Delete this course?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </section>

    <section class="card" style="margin-bottom: 18px;">
        <div class="meta">
            <div><strong>Code</strong><br><span class="muted">{{ $course->code }}</span></div>
            <div><strong>Student</strong><br><span class="muted">{{ $course->student?->name ?? 'N/A' }}</span></div>
            <div><strong>Credit Hours</strong><br><span class="muted">{{ $course->credit_hours }}</span></div>
            <div><strong>Description</strong><br><span class="muted">{{ $course->description ?? 'N/A' }}</span></div>
        </div>
    </section>
@endsection