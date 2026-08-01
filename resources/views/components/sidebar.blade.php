<div class="sidebar bg-dark text-white position-fixed top-0 start-0 vh-100 p-4 shadow-lg d-none d-lg-flex flex-column">
    <div class="sidebar-brand text-center mb-4">
        <div class="display-6 fw-bold mb-1">SIS</div>
        <div class="text-muted small">Student Information</div>
    </div>

    <ul class="nav nav-pills flex-column gap-2 flex-grow-1">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
                class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line me-2"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('students') }}"
                class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('students') ? 'active' : '' }}">
                <i class="fas fa-user-graduate me-2"></i>
                Students
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('courses') }}"
                class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('courses') ? 'active' : '' }}">
                <i class="fas fa-book-open me-2"></i>
                Courses
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('subjects') }}"
                class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('subjects') ? 'active' : '' }}">
                <i class="fas fa-book me-2"></i>
                Subjects
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('instructors') }}"
                class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('instructors') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher me-2"></i>
                Instructors
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('enrollments') }}"
                class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('enrollments') ? 'active' : '' }}">
                <i class="fas fa-file-alt me-2"></i>
                Enrollments
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('reports') }}"
                class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('reports') ? 'active' : '' }}">
                <i class="fas fa-chart-area me-2"></i>
                Reports
            </a>
        </li>
    </ul>

    <div class="mt-auto pt-4 border-top border-secondary border-opacity-25">
        <a href="#" class="nav-link text-danger px-3 py-2 rounded-3">
            <i class="fas fa-sign-out-alt me-2"></i>
            Logout
        </a>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="bg-dark text-white vh-100 p-4">
            <div class="sidebar-brand text-center mb-4">
                <div class="display-6 fw-bold mb-1">SIS</div>
                <div class="text-muted small">Student Information</div>
            </div>
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-chart-line me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('students') }}"
                        class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('students') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate me-2"></i>
                        Students
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('courses') }}"
                        class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('courses') ? 'active' : '' }}">
                        <i class="fas fa-book-open me-2"></i>
                        Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subjects') }}"
                        class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('subjects') ? 'active' : '' }}">
                        <i class="fas fa-book me-2"></i>
                        Subjects
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('instructors') }}"
                        class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('instructors') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher me-2"></i>
                        Instructors
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('enrollments') }}"
                        class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('enrollments') ? 'active' : '' }}">
                        <i class="fas fa-file-alt me-2"></i>
                        Enrollments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reports') }}"
                        class="nav-link text-white px-3 py-2 rounded-3 {{ request()->routeIs('reports') ? 'active' : '' }}">
                        <i class="fas fa-chart-area me-2"></i>
                        Reports
                    </a>
                </li>
            </ul>
            <div class="mt-4 pt-3 border-top border-secondary border-opacity-25">
                <a href="#" class="nav-link text-danger px-3 py-2 rounded-3">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
