<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #F8FAFC;
            font-family: 'Montserrat', sans-serif;
            color: #374050;
        }
        .sidebar {
            height: 100vh;
            background: #374050;
            color: #E5E7EB;
            position: fixed;
            width: 240px;
        }
        .sidebar a {
            color: #CBD5E1;
            text-decoration: none;
            display: block;
            padding: 14px 22px;
            transition: background 0.2s ease, color 0.2s ease;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #FF6700;
            color: #fff;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
        }
        .navbar-custom {
            background: #fff;
            border-bottom: 1px solid #EBEBEB;
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0px 18px 45px rgba(55, 64, 80, 0.08);
            background: #fff;
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
        .text-muted {
            color: #798696 !important;
        }
        .alert {
            border-radius: 12px;
        }
    </style>
</head>
<body>

@auth
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom">SMS PANEL</h4>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.results') }}">Manage Results</a>
        @endif

        @if(auth()->user()->role === 'teacher')
            <a href="{{ route('scores.create') }}">Enter Scores</a>
        @endif

        @if(auth()->user()->role === 'student')
            <a href="{{ route('student.results') }}">My Results</a>
        @endif
    </div>
@endauth

<!-- Main Content -->
<div class="content">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand navbar-light navbar-custom mb-4 px-4">
        <div class="ms-auto">
            @auth
                <span class="me-3">Welcome, <strong>{{ auth()->user()->name }}</strong></span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <!-- Page Content -->
    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>