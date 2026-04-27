@extends('layouts.app')

@section('content')
    <section class="card" style="margin-bottom: 18px;">
        <div class="actions" style="justify-content: space-between; align-items: center;">
            <div>
                <h2 style="margin-bottom: 6px;">Students</h2>
                <p class="muted" style="margin: 0;">Eloquent CRUD for the Student model.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('students.create') }}">Add Student</a>
        </div>
    </section>

    <section class="table">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Courses</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone ?? 'N/A' }}</td>
                        <td>{{ $student->age ?? 'N/A' }}</td>
                        <td>{{ $student->courses_count }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-soft" href="{{ route('students.show', $student) }}">View</a>
                                <a class="btn btn-soft" href="{{ route('students.edit', $student) }}">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No students found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection