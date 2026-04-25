<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Environment Configuration Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        h1 { color: #27ae60; }
        .info { background: white; padding: 20px; border-radius: 6px; margin-top: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        code { background: #eee; padding: 2px 6px; border-radius: 3px; }
    </style>
</head>
<body>
    <h1>Environment Configuration Demo</h1>

    <div class="info">
        <p><strong>App Name:</strong> <code>{{ $appName }}</code></p>
        <p><strong>App Environment:</strong> <code>{{ $appEnv }}</code></p>
    </div>

    <p>Note: These values are safely read via <code>config()</code> and originate from your <code>.env</code> file.</p>
</body>
</html>