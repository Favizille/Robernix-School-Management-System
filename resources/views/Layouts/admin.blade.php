<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | School Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
            background: #F8FAFC;
            color: #374050;
        }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #374050;
            color: #E5E7EB;
            position: fixed;
            padding: 24px 0;
        }
        .sidebar .brand {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: #FF6700;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 1.75rem;
        }
        .sidebar nav a {
            display: block;
            color: #CBD5E1;
            padding: 14px 24px;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
        }
        .sidebar nav a.active,
        .sidebar nav a:hover {
            background: #FF6700;
            color: #fff;
        }
        .content-wrapper {
            margin-left: 260px;
            padding: 24px;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 24px;
        }
        .topbar .user-chip {
            background: #fff;
            border: 1px solid #EBEBEB;
            border-radius: 999px;
            padding: 0.65rem 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.95rem;
            color: #374050;
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 18px 45px rgba(55, 64, 80, 0.08);
            background: #fff;
        }
        .badge-soft {
            background: rgba(255, 103, 0, 0.12);
            color: #FF6700;
        }
        .table thead th {
            border-bottom: 1px solid #EBEBEB;
        }
        .table tbody tr:hover {
            background: #f8fafc;
        }
        .btn-primary {
            background: #FF6700;
            border-color: #FF6700;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background: #E25900;
            border-color: #E25900;
        }
        .form-label {
            font-weight: 600;
            color: #374050;
        }
        .form-control:focus,
        .form-select:focus {
            border-color: #FF6700;
            box-shadow: 0 0 0 0.15rem rgba(255, 103, 0, 0.2);
        }
        @media(max-width: 991px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }
            .content-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">Admin</div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.results') }}" class="{{ request()->routeIs('admin.results') ? 'active' : '' }}">Teachers</a>
            <a href="{{ route('admin.results') }}" class="{{ request()->routeIs('admin.results') ? 'active' : '' }}">Students</a>
            <a href="{{ route('admin.results') }}" class="{{ request()->routeIs('admin.results') ? 'active' : '' }}">Manage Results</a>
            <a href="{{ route('scores.create') }}" class="{{ request()->routeIs('scores.create') ? 'active' : '' }}">Enter Scores</a>
            <a href="{{ route('admin.register') }}" class="{{ request()->routeIs('admin.register') ? 'active' : '' }}">Register</a>
        </nav>
    </div>

    <div class="content-wrapper">
        <div class="topbar">
            <div>
                <h2 class="mb-1">Admin - SMS</h2>
                <p class="text-muted mb-0">Manage classes, results, and academic settings from one place with ease.</p>
            </div>
            <div class="user-chip">
                <i class="bi bi-person-circle"></i>
                {{ auth()->user()?->name ?? 'Admin User' }}
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
