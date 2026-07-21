<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('hidden.bs.modal', function (event) {
    document.activeElement.blur();
});
</script>
<script src="{{ asset('js/create.js') }}"></script>
<script src="{{ asset('js/view.js') }}"></script>
<script src="{{ asset('js/edit.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>
</body>
</html>