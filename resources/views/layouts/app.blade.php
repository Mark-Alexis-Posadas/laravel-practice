<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main class="p-5">
        <x-loading-spinner />
        <div class="container">
            @yield('content')
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    @if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = new bootstrap.Modal(
            document.getElementById('createPersonModal')
        );

        modal.show();
    });
</script> @endif
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs"></script>
    <script>
        document.addEventListener('hidden.bs.modal', function(event) {
            document.activeElement.blur();
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/create.js') }}"></script>
    <script src="{{ asset('js/view.js') }}"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    <script>
        $('#personForm').parsley();
    </script>
</body>

</html>
