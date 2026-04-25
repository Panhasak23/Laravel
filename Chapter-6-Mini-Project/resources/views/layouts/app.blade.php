<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student List and Blog Application built with Laravel">
    <title>@yield('title', 'Laravel Application')</title>
    
    <style>
        /* Reset and Base Styles */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Layout Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.75rem;
            font-weight: 700;
            text-decoration: none;
            color: white;
        }

        .logo:hover {
            color: #f0f0f0;
        }

        /* Navigation */
        .nav {
            display: flex;
            gap: 1rem;
        }

        .nav-link {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background-color: white;
            color: #667eea;
        }

        /* Main Content */
        .main-content {
            padding: 2rem 0;
            min-height: calc(100vh - 200px);
        }

        /* Page Title */
        .page-title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #667eea;
            display: inline-block;
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9ff;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badge Styles */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .badge-primary {
            background-color: #667eea;
            color: white;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
        }

        .badge-info {
            background-color: #17a2b8;
            color: white;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #333;
        }

        /* Blog Post Card */
        .post-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .post-card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
        }

        .post-card-title {
            font-size: 1.5rem;
            margin-bottom: 0;
        }

        .post-card-meta {
            display: flex;
            gap: 1rem;
            margin-top: 0.75rem;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .post-card-body {
            padding: 1.5rem;
        }

        .post-excerpt {
            color: #666;
            line-height: 1.8;
        }

        .post-card-footer {
            padding: 1rem 1.5rem;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }

        /* Blog Detail Page */
        .blog-detail {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .blog-detail-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
        }

        .blog-detail-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .blog-detail-meta {
            display: flex;
            gap: 1.5rem;
            font-size: 1rem;
            opacity: 0.9;
        }

        .blog-detail-body {
            padding: 2rem;
            line-height: 1.9;
            color: #444;
        }

        .blog-detail-content {
            white-space: pre-wrap;
        }

        /* Back Link */
        .back-link {
            display: inline-block;
            margin-bottom: 1.5rem;
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #764ba2;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Footer */
        .footer {
            background-color: #2d3748;
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: 3rem;
        }

        .footer-content {
            opacity: 0.8;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav {
                flex-direction: column;
                width: 100%;
            }

            .nav-link {
                text-align: center;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .table {
                font-size: 0.9rem;
            }

            .table th, .table td {
                padding: 0.75rem 0.5rem;
            }

            .blog-detail-title {
                font-size: 1.75rem;
            }

            .blog-detail-meta {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .post-card {
            animation: fadeIn 0.5s ease-out;
        }

        .post-card:nth-child(2) { animation-delay: 0.1s; }
        .post-card:nth-child(3) { animation-delay: 0.2s; }
        .post-card:nth-child(4) { animation-delay: 0.3s; }
        .post-card:nth-child(5) { animation-delay: 0.4s; }
        .post-card:nth-child(6) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="{{ route('students.index') }}" class="logo">Laravel App</a>
                <nav class="nav">
                    <a href="{{ route('students.index') }}" class="nav-link {{ Request::routeIs('students.index') ? 'active' : '' }}">Students</a>
                    <a href="{{ route('posts.index') }}" class="nav-link {{ Request::routeIs('posts.index') ? 'active' : '' }}">Blog</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; {{ date('Y') }} Laravel Student List &amp; Blog Application. All rights reserved.</p>
                <p>Built with Laravel {{ app()->version() }}</p>
            </div>
        </div>
    </footer>
</body>
</html>

