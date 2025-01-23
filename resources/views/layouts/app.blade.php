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
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-3">
                <h4 class="text-center">Monitor Device System</h4><hr>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Data Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms.index') }}">Data Ruang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('devices.index') }}">Data Perangkat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('workorders.index') }}">Data Pelaporan</a>
                    </li>
                </ul>

            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1 text-white">Sistem Pemantauan Service & Maintenance Perangkat</span>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
                <!-- Main Page Content -->
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
