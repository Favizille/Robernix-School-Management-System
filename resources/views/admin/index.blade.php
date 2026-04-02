 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EduAdmin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="sidebar bg-dark text-white" id="sidebar">
        <div class="sidebar-header p-3 border-bottom border-secondary">
            <div class="d-flex align-items-center">
                <div class="bg-primary rounded p-2 me-2"><i class="bi-mortarboard-fill text-white fs-5"></i></div>
                <div><h6 class="mb-0 fw-bold">EduAdmin</h6><small class="text-secondary">School Management</small></div>
            </div>
        </div>
        <ul class="nav flex-column p-3"><li class="nav-item"><a class="nav-link active" href="index.html"><i class="bi-speedometer2 me-2"></i>Dashboard</a></li>
<li class="nav-item"><a class="nav-link " href="teachers.html"><i class="bi-people me-2"></i>Teachers</a></li>
<li class="nav-item"><a class="nav-link " href="students.html"><i class="bi-mortarboard me-2"></i>Students</a></li>
<li class="nav-item"><a class="nav-link " href="results.html"><i class="bi-clipboard-data me-2"></i>Results</a></li>
<li class="nav-item"><a class="nav-link " href="classes.html"><i class="bi-book me-2"></i>Classes</a></li>
<li class="nav-item"><a class="nav-link " href="calendar.html"><i class="bi-calendar-event me-2"></i>Calendar</a></li>
</ul>
        <div class="mt-auto p-3 border-top border-secondary">
            <a class="nav-link text-secondary" href="#"><i class="bi-gear me-2"></i>Settings</a>
            <a class="nav-link text-secondary" href="#"><i class="bi-box-arrow-left me-2"></i>Log Out</a>
        </div>
    </div>
    <div class="flex-grow-1">
        <nav class="navbar navbar-light bg-white border-bottom px-4">
            <button class="btn btn-sm btn-outline-secondary d-md-none" onclick="document.getElementById('sidebar').classList.toggle('show')"><i class="bi-list"></i></button>
            <form class="d-none d-md-flex ms-2"><input class="form-control form-control-sm" placeholder="Search..." style="width:250px"></form>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm position-relative"><i class="bi-bell fs-5"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:.5rem">3</span></button>
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:.8rem;font-weight:600">AD</div>
                    <div class="d-none d-md-block"><div class="fw-semibold" style="font-size:.85rem">Admin User</div><div class="text-muted" style="font-size:.7rem">admin@eduadmin.com</div></div>
                </div>
            </div>
        </nav>
        <main class="p-4">
<h3 class="fw-bold">Dashboard</h3>
<p class="text-muted">Welcome back! Here's what's happening at your school.</p>
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-lg-3"><div class="card stat-card p-3"><div class="d-flex justify-content-between"><div><div class="text-muted small">Total Students</div><div class="fs-4 fw-bold">1,234</div><small class="text-success">+12% from last term</small></div><div class="bg-primary bg-opacity-10 rounded p-2 align-self-start"><i class="bi-mortarboard fs-4 text-primary"></i></div></div></div></div>
  <div class="col-sm-6 col-lg-3"><div class="card stat-card p-3"><div class="d-flex justify-content-between"><div><div class="text-muted small">Total Teachers</div><div class="fs-4 fw-bold">87</div><small class="text-success">+3 new this month</small></div><div class="bg-success bg-opacity-10 rounded p-2 align-self-start"><i class="bi-people fs-4 text-success"></i></div></div></div></div>
  <div class="col-sm-6 col-lg-3"><div class="card stat-card p-3"><div class="d-flex justify-content-between"><div><div class="text-muted small">Active Classes</div><div class="fs-4 fw-bold">42</div><small class="text-muted">Same as last term</small></div><div class="bg-warning bg-opacity-10 rounded p-2 align-self-start"><i class="bi-book fs-4 text-warning"></i></div></div></div></div>
  <div class="col-sm-6 col-lg-3"><div class="card stat-card p-3"><div class="d-flex justify-content-between"><div><div class="text-muted small">Avg. Performance</div><div class="fs-4 fw-bold">78%</div><small class="text-success">+5% improvement</small></div><div class="bg-info bg-opacity-10 rounded p-2 align-self-start"><i class="bi-trophy fs-4 text-info"></i></div></div></div></div>
</div>
<div class="row g-4 mb-4">
  <div class="col-lg-8"><div class="card border-0 shadow-sm p-3"><h6 class="fw-bold">Weekly Attendance</h6><canvas id="attendanceChart" height="140"></canvas></div></div>
  <div class="col-lg-4"><div class="card border-0 shadow-sm p-3"><h6 class="fw-bold">Grade Distribution</h6><canvas id="gradeChart" height="200"></canvas></div></div>
</div>
<div class="card border-0 shadow-sm p-3">
  <h6 class="fw-bold mb-3">Recent Teacher Activities</h6>
  <div class="list-group list-group-flush">
    <div class="list-group-item d-flex align-items-center gap-3 px-0"><div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px"><span class="fw-bold text-primary small">MJ</span></div><div class="flex-grow-1"><div class="fw-semibold small">Mrs. Johnson</div><div class="text-muted small">Submitted grades for Class 10A</div></div><small class="text-muted">2h ago</small></div>
    <div class="list-group-item d-flex align-items-center gap-3 px-0"><div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px"><span class="fw-bold text-success small">MS</span></div><div class="flex-grow-1"><div class="fw-semibold small">Mr. Smith</div><div class="text-muted small">Updated attendance records</div></div><small class="text-muted">3h ago</small></div>
    <div class="list-group-item d-flex align-items-center gap-3 px-0"><div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px"><span class="fw-bold text-info small">DW</span></div><div class="flex-grow-1"><div class="fw-semibold small">Dr. Williams</div><div class="text-muted small">Added new assignment for Physics</div></div><small class="text-muted">5h ago</small></div>
    <div class="list-group-item d-flex align-items-center gap-3 px-0"><div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px"><span class="fw-bold text-warning small">MD</span></div><div class="flex-grow-1"><div class="fw-semibold small">Ms. Davis</div><div class="text-muted small">Scheduled parent-teacher meeting</div></div><small class="text-muted">1d ago</small></div>
  </div>
</div>
</main></div></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="js/custom.js"></script>
</body></html>