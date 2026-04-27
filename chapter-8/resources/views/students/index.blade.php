@extends('layouts.app')

@section('content')
    <h1>Students</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        {{ $student->score }}
                        @if ($student->score >= 85)
                            <span style="margin-left: 8px; padding: 2px 8px; border-radius: 999px; background: #dcfce7; color: #166534; font-size: 0.82rem;">Excellent</span>
                        @elseif ($student->score >= 70)
                            <span style="margin-left: 8px; padding: 2px 8px; border-radius: 999px; background: #dbeafe; color: #1e40af; font-size: 0.82rem;">Good</span>
                        @else
                            <span style="margin-left: 8px; padding: 2px 8px; border-radius: 999px; background: #fee2e2; color: #991b1b; font-size: 0.82rem;">Needs Improvement</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a class="btn" href="{{ route('students.show', $student) }}">View</a>
                            <a class="btn btn-gray" href="{{ route('students.edit', $student) }}">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="muted">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 14px;">
        {{ $students->links() }}
    </div>
@endsection
