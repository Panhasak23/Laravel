<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 6 | Blade Practice</title>
    <style>
        :root {
            --bg: #f4f1ea;
            --panel: rgba(255, 255, 255, 0.82);
            --panel-border: rgba(44, 32, 24, 0.12);
            --text: #1f1a17;
            --muted: #64584f;
            --accent: #b14d2e;
            --accent-soft: #f6e2d8;
            --shadow: 0 18px 45px rgba(44, 32, 24, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(177, 77, 46, 0.16), transparent 34%),
                radial-gradient(circle at top right, rgba(84, 117, 148, 0.14), transparent 30%),
                linear-gradient(180deg, #f8f4ee 0%, #efe8de 100%);
            padding: 32px;
        }

        .shell {
            max-width: 1180px;
            margin: 0 auto;
        }

        .hero {
            padding: 32px 34px;
            margin-bottom: 24px;
            background: var(--panel);
            border: 1px solid var(--panel-border);
            border-radius: 24px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(14px);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: 999px;
            background: var(--accent-soft);
            color: var(--accent);
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .hero h1 {
            margin: 18px 0 10px;
            font-size: clamp(2rem, 3.8vw, 3.5rem);
            line-height: 1.05;
        }

        .hero p {
            margin: 0;
            max-width: 720px;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 18px;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--panel-border);
            border-radius: 22px;
            box-shadow: var(--shadow);
            padding: 24px;
            backdrop-filter: blur(14px);
        }

        .span-6 { grid-column: span 6; }
        .span-12 { grid-column: span 12; }

        .section-title {
            margin: 0 0 18px;
            font-size: 1.6rem;
        }

        .section-kicker {
            margin: 0 0 6px;
            color: var(--accent);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .feature-list {
            margin: 0;
            padding-left: 20px;
            color: var(--muted);
            line-height: 1.7;
        }

        .feature-list li + li {
            margin-top: 8px;
        }

        .code-pill {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 8px;
            background: rgba(177, 77, 46, 0.12);
            color: var(--accent);
            font-size: 0.92em;
            font-weight: 700;
        }

        .practice-grid,
        .assignment-grid,
        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .item {
            padding: 22px;
            border-radius: 18px;
            border: 1px solid rgba(44, 32, 24, 0.09);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.8), rgba(246, 238, 228, 0.8));
        }

        .item h3 {
            margin: 0 0 12px;
            font-size: 1.08rem;
        }

        .item p,
        .item li {
            color: var(--muted);
            line-height: 1.65;
        }

        .mini-projects {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 18px;
            align-items: stretch;
        }

        .project-highlight {
            border-radius: 20px;
            padding: 24px;
            color: #fff;
            background:
                linear-gradient(140deg, rgba(30, 41, 59, 0.9), rgba(177, 77, 46, 0.95)),
                linear-gradient(180deg, #1f2937, #7c2d12);
            box-shadow: 0 18px 45px rgba(31, 41, 55, 0.2);
            position: relative;
            overflow: hidden;
        }

        .project-highlight::after {
            content: "";
            position: absolute;
            inset: auto -20px -30px auto;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .project-highlight h3 {
            margin: 0 0 10px;
            font-size: 1.4rem;
        }

        .project-highlight ul {
            margin: 0;
            padding-left: 18px;
            line-height: 1.8;
        }

        .footer-note {
            margin-top: 18px;
            color: var(--muted);
            font-size: 0.95rem;
            text-align: center;
        }

        @media (max-width: 900px) {
            body {
                padding: 18px;
            }

            .span-6,
            .mini-projects,
            .practice-grid,
            .assignment-grid,
            .project-grid {
                grid-column: span 12;
                grid-template-columns: 1fr;
            }

            .hero,
            .card {
                padding: 22px;
            }
        }
    </style>
</head>
<body>
    <main class="shell">
        <section class="hero">
            <div class="eyebrow">Chapter 6</div>
            <h1>Blade Practice, Assignments, and Mini-Projects</h1>
            <p>
                A simple landing page for the Chapter 6 workspace. It replaces the default Laravel welcome screen
                with a focused overview of the required Blade exercises.
            </p>
        </section>

        <section class="grid">
            <article class="card span-6">
                <p class="section-kicker">2 Practices</p>
                <h2 class="section-title">Blade basics and loops</h2>
                <div class="practice-grid">
                    <div class="item">
                        <h3>Practice 1: Basic Blade Syntax</h3>
                        <ul class="feature-list">
                            <li>Create a view: <span class="code-pill">profile.blade.php</span></li>
                            <li>Display <span class="code-pill">Name</span> and <span class="code-pill">Age</span></li>
                            <li>Use <span class="code-pill">{{ '{{ }}' }}</span> and <span class="code-pill">@if</span></li>
                        </ul>
                    </div>
                    <div class="item">
                        <h3>Practice 2: Loop Practice</h3>
                        <ul class="feature-list">
                            <li>Create a view: <span class="code-pill">students.blade.php</span></li>
                            <li>Display a list of students using <span class="code-pill">@foreach</span></li>
                            <li>Focus on dynamic rendering</li>
                        </ul>
                    </div>
                </div>
            </article>

            <article class="card span-6">
                <p class="section-kicker">2 Assignments</p>
                <h2 class="section-title">Layouts and conditional UI</h2>
                <div class="assignment-grid">
                    <div class="item">
                        <h3>Assignment 1: Layout Design</h3>
                        <ul class="feature-list">
                            <li>Create a layout with header and footer</li>
                            <li>Create two pages: Home and About</li>
                            <li>Use <span class="code-pill">@extends</span> and <span class="code-pill">@section</span></li>
                        </ul>
                    </div>
                    <div class="item">
                        <h3>Assignment 2: Conditional UI</h3>
                        <ul class="feature-list">
                            <li>Display an admin panel when role equals admin</li>
                            <li>Display a user dashboard otherwise</li>
                            <li>Apply Blade conditionals cleanly</li>
                        </ul>
                    </div>
                </div>
            </article>

            <article class="card span-12">
                <p class="section-kicker">2 Mini-Projects</p>
                <h2 class="section-title">Student list and simple blog UI</h2>
                <div class="mini-projects">
                    <div class="item">
                        <h3>Mini-Project 1: Student List UI</h3>
                        <ul class="feature-list">
                            <li>Controller sends student array</li>
                            <li>Blade view uses <span class="code-pill">@foreach</span></li>
                            <li>Layout, name, and age are displayed clearly</li>
                            <li>Skills gained: controller to view flow, Blade loops, and variable output</li>
                        </ul>
                    </div>
                    <div class="project-highlight">
                        <h3>Mini-Project 2: Simple Blog UI</h3>
                        <ul>
                            <li>Blog layout with header and footer</li>
                            <li>Pages for blog list and blog detail</li>
                            <li>Blade used for sections, layouts, and data display</li>
                            <li>Skills gained: reusable UI and MVC flow</li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>

        <div class="footer-note">Chapter 6 Laravel Blade overview</div>
    </main>
</body>
</html>