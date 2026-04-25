<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Azure Luxe Hotel')</title>
    <style>
        body { margin: 0; padding: 0; font-family: Arial; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>