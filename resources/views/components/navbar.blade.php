<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm fixed-top">
    <div class="container-fluid px-4">
        <button class="btn btn-outline-secondary d-lg-none me-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
            <i class="fas fa-bars"></i>
        </button>

        <a class="navbar-brand fw-bold mb-0" href="{{ route('dashboard') }}">
            Personal Information System
        </a>

        <div class="d-flex align-items-center ms-auto gap-3">
            <div class="d-none d-md-block text-secondary small">
                Welcome, {{ Auth::user()->name ?? 'Admin' }}
            </div>
            <div
                class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center avatar-sm">
                {{ strtoupper(strtok(Auth::user()->name ?? 'A', ' ')) }}
            </div>
        </div>
    </div>
</nav>
