@extends('layouts.app')

@section('content')
    <section class="card" style="margin-bottom: 18px;">
        <div class="actions" style="justify-content: space-between; align-items: center;">
            <div>
                <h2 style="margin-bottom: 6px;">{{ $student->name }}</h2>
                <p class="muted" style="margin: 0;">Student profile with related courses.</p>
            </div>
            <div class="actions">
                <a class="btn btn-soft" href="{{ route('students.edit', $student) }}">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </section>

    <section class="card" style="margin-bottom: 18px;">
        <div class="meta">
            <div><strong>Email</strong><br><span class="muted">{{ $student->email }}</span></div>
            <div><strong>Phone</strong><br><span class="muted">{{ $student->phone ?? 'N/A' }}</span></div>
            <div><strong>Age</strong><br><span class="muted">{{ $student->age ?? 'N/A' }}</span></div>
            <div><strong>Courses</strong><br><span class="muted">{{ $student->courses->count() }}</span></div>
        </div>
    </section>

    <section class="table">
        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Code</th>
                    <th>Credit Hours</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($student->courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->credit_hours }}</td>
                        <td>{{ $course->description ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4">This student does not have any courses yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection