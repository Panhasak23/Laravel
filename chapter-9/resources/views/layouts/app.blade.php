<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} | Chapter 9</title>
    <style>
        :root { --bg: #0f172a; --panel: #111827; --panel-2: #1f2937; --accent: #f59e0b; --text: #e5e7eb; --muted: #94a3b8; --border: #334155; --success: #22c55e; --danger: #ef4444; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; background: linear-gradient(180deg, #020617 0%, #0f172a 45%, #111827 100%); color: var(--text); }
        a { color: inherit; text-decoration: none; }
        .shell { max-width: 1180px; margin: 0 auto; padding: 24px; }
        .topbar, .card, .table, .form, .flash { background: rgba(17, 24, 39, 0.92); border: 1px solid var(--border); border-radius: 18px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; padding: 18px 22px; margin-bottom: 24px; backdrop-filter: blur(12px); }
        .brand { display: flex; flex-direction: column; gap: 4px; }
        .brand strong { font-size: 1.05rem; letter-spacing: .02em; }
        .brand span, .muted { color: var(--muted); }
        .nav { display: flex; flex-wrap: wrap; gap: 10px; }
        .nav a, .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; border-radius: 999px; padding: 10px 14px; border: 1px solid var(--border); background: var(--panel-2); }
        .nav a:hover, .btn:hover { border-color: var(--accent); }
        .hero { display: grid; grid-template-columns: 1.35fr .65fr; gap: 18px; margin-bottom: 24px; }
        .card { padding: 22px; }
        .card h1, .card h2, .card h3 { margin-top: 0; }
        .grid { display: grid; gap: 16px; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); }
        .pill { display: inline-flex; padding: 6px 10px; border-radius: 999px; background: rgba(245, 158, 11, .14); color: #fbbf24; margin-bottom: 10px; }
        .table { overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px 16px; border-bottom: 1px solid var(--border); text-align: left; vertical-align: top; }
        th { color: #cbd5e1; background: rgba(31, 41, 55, .78); }
        .actions { display: flex; flex-wrap: wrap; gap: 10px; }
        .btn-primary { background: linear-gradient(135deg, #f59e0b, #fb7185); color: #111827; border-color: transparent; font-weight: 700; }
        .btn-danger { background: rgba(239, 68, 68, .15); color: #fecaca; }
        .btn-soft { background: rgba(148, 163, 184, .12); }
        .form { padding: 22px; max-width: 760px; }
        .field { margin-bottom: 14px; }
        label { display: block; margin-bottom: 6px; color: #cbd5e1; }
        input, textarea, select { width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid var(--border); background: #0b1220; color: var(--text); }
        textarea { min-height: 120px; resize: vertical; }
        .flash { padding: 14px 16px; margin-bottom: 18px; border-left: 4px solid var(--success); }
        .flash.error { border-left-color: var(--danger); }
        .list { margin: 0; padding-left: 18px; color: var(--muted); }
        .meta { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px; }
        .meta div { background: rgba(15, 23, 42, .72); border: 1px solid var(--border); border-radius: 14px; padding: 14px; }
        .stack { display: grid; gap: 12px; }
        @media (max-width: 820px) { .hero { grid-template-columns: 1fr; } .topbar { align-items: flex-start; flex-direction: column; } }
    </style>
</head>
<body>
    <div class="shell">
        <header class="topbar">
            <div class="brand">
                <strong>{{ config('app.name', 'Laravel') }} - Chapter 9</strong>
                <span>Eloquent ORM demo for students, courses, and products.</span>
            </div>
            <nav class="nav">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('students.index') }}">Students</a>
                <a href="{{ route('courses.index') }}">Courses</a>
                <a href="{{ route('products.index') }}">Products</a>
            </nav>
        </header>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="flash error">
                <strong>Please fix the following:</strong>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>