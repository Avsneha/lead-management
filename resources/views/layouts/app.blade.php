<!DOCTYPE html>
<html>
<head>
    <title>Lead Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('leads.index') }}">
            <i class="bi bi-kanban-fill me-1"></i> Lead Management
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}" 
                       href="{{ route('dashboard') }}">
                       <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning fw-bold" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
