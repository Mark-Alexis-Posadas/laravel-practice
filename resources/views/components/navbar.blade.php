<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">

    <div class="container-fluid">

        <span class="navbar-brand fw-bold">
            Student Information System
        </span>

        <div class="ms-auto">

            <span class="me-3">
                Welcome, {{ Auth::user()->name ?? 'Admin' }}
            </span>

            <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-circle" width="40">

        </div>

    </div>

</nav>
