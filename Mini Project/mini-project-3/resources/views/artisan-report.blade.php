<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan Command Practice Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f0f0f0; }
        h1 { color: #8e44ad; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f3e5f5; }
        code { background: #f1f1f1; padding: 2px 5px; border-radius: 3px; }
    </style>
</head>
<body>
    <h1>Artisan Command Practice Report</h1>

    <table>
        <thead>
            <tr>
                <th>Command Used</th>
                <th>Purpose</th>
                <th>Files Generated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commands as $cmd)
            <tr>
                <td><code>{{ $cmd['command'] }}</code></td>
                <td>{{ $cmd['purpose'] }}</td>
                <td><code>{{ $cmd['files'] }}</code></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>