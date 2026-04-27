<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 7</title>
    <style>
        :root {
            --bg-1: #0f172a;
            --bg-2: #1e293b;
            --card: rgba(255, 255, 255, 0.08);
            --text: #f8fafc;
            --accent: #22d3ee;
            --accent-2: #38bdf8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background: linear-gradient(140deg, var(--bg-1), var(--bg-2));
            padding: 24px;
        }

        .page {
            width: min(760px, 100%);
            background: var(--card);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 28px;
            backdrop-filter: blur(8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            color: var(--accent);
        }

        p {
            margin: 0;
            line-height: 1.7;
            color: rgba(248, 250, 252, 0.92);
        }

        .tag {
            display: inline-block;
            margin-top: 14px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(34, 211, 238, 0.2);
            border: 1px solid rgba(56, 189, 248, 0.45);
            color: var(--accent-2);
            font-weight: 600;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <main class="page">
        <h1>Chapter 7 Page</h1>
        <p>
            This is the new custom page for Chapter 7. The default Laravel welcome page
            has been removed and replaced with this view.
        </p>
        <span class="tag">Laravel Chapter 7</span>
    </main>
</body>
</html>
