<!DOCTYPE html>
<html>
<head>
    <title>All Students</title>
</head>
<body>
    <h1>All Students</h1>
    @if($students->count() > 0)
        <ul>
            @foreach ($students as $student)
                <li>
                    <a href="{{ route('student.show', $student->id) }}">
                        {{ $student->name }} ({{ $student->email }})
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No students found.</p>
    @endif
</body>
</html>