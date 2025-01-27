<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #1e293b; /* Dark theme */
            color: #ffffff;
        }
        .navbar, .footer {
            background: #0f172a;
        }
        .sidebar {
            background: #334155;
            color: #ffffff;
            min-height: 100vh;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #38bdf8; /* Tailwind blue */
        }
        .main-content {
            padding: 20px;
        }
    </style>
    @stack('styles') <!-- Untuk CSS tambahan per level -->
</head>
<body>
    @yield('body')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts') <!-- Untuk JavaScript tambahan per level -->
</body>
</html>
