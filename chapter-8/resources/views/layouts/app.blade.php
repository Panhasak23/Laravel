<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 8 Student Management</title>
    <style>
        :root {
            --bg: #eef2ff;
            --panel: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #2563eb;
            --danger: #dc2626;
            --border: #dbe3f1;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: linear-gradient(160deg, #eef2ff, #e0ecff);
            min-height: 100vh;
        }

        .container {
            max-width: 1020px;
            margin: 0 auto;
            padding: 24px 18px 40px;
        }

        .nav {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 1.2rem;
            font-weight: 700;
            text-decoration: none;
            color: var(--text);
        }

        .btn {
            border: 0;
            background: var(--accent);
            color: #fff;
            padding: 9px 14px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn-gray {
            background: #6b7280;
        }

        .btn-danger {
            background: var(--danger);
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border-bottom: 1px solid var(--border);
            padding: 10px;
            text-align: left;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .flash {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
            padding: 10px 12px;
            border-radius: 10px;
            margin-bottom: 14px;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 10px 12px;
            border-radius: 10px;
            margin-bottom: 14px;
        }

        .field {
            margin-bottom: 12px;
        }

        .field label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .field input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 9px 10px;
            font-size: 0.95rem;
        }

        .muted {
            color: var(--muted);
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="nav">
            <a class="brand" href="{{ route('students.index') }}">Student Management</a>
            <a class="btn" href="{{ route('students.create') }}">Add Student</a>
        </nav>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="card">
            @yield('content')
        </section>
    </div>
</body>
</html>
