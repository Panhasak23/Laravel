<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Folder Structure</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f9f9f9; }
        h1 { color: #2c3e50; }
        .folder { margin-bottom: 25px; padding: 15px; background: white; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .folder h2 { color: #3498db; margin-top: 0; }
        .folder p { line-height: 1.5; }
    </style>
</head>
<body>
    <h1>Laravel Core Directories Explained</h1>

    <div class="folder">
        <h2>📁 app/</h2>
        <p>Contains the core application logic: Models, Controllers, Policies, Providers, and more. This is where your business logic lives.</p>
    </div>

    <div class="folder">
        <h2>📁 routes/</h2>
        <p>Defines all application routes (web, API, console, channels). The <code>web.php</code> file handles web requests with session state.</p>
    </div>

    <div class="folder">
        <h2>📁 resources/</h2>
        <p>Holds views (Blade templates), CSS/JS source files (if not using Vite assets), language files, and uncompiled assets.</p>
    </div>

    <div class="folder">
        <h2>📁 public/</h2>
        <p>The document root of your application. Contains compiled assets, favicon, and <code>index.php</code> (front controller).</p>
    </div>

    <div class="folder">
        <h2>📁 config/</h2>
        <p>Stores configuration files for database, mail, cache, app settings, etc. Values can be overridden by <code>.env</code>.</p>
    </div>
</body>
</html>