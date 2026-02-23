<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            background: #1f2937;
            color: white;
            position: fixed;
            width: 240px;
        }
        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover {
            background: #374151;
            color: white;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
        }
        .navbar-custom {
            background: white;
            border-bottom: 1px solid #ddd;
        }
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

@auth
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom">SMS PANEL</h4>

        @if(auth()->user()->role === 'admin')
            <a href="#">Dashboard</a>
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