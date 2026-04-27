@extends('layouts.app')

@section('content')
    <section class="card" style="margin-bottom: 18px;">
        <div class="actions" style="justify-content: space-between; align-items: center;">
            <div>
                <h2 style="margin-bottom: 6px;">Courses</h2>
                <p class="muted" style="margin: 0;">Courses belong to one student through student_id.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('courses.create') }}">Add Course</a>
        </div>
    </section>

    <section class="table">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Student</th>
                    <th>Credit Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->student?->name ?? 'N/A' }}</td>
                        <td>{{ $course->credit_hours }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-soft" href="{{ route('courses.show', $course) }}">View</a>
                                <a class="btn btn-soft" href="{{ route('courses.edit', $course) }}">Edit</a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No courses found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection