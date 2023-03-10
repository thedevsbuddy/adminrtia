<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset(getSetting('app_favicon')) }}" type="image/x-icon">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <script>
        window._asset = '{{ asset('') }}';
        window._settings = '{{ getSetting() }}';
    </script>
    @routes
    <script src="{{ asset('/js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body class="antialiased bg-light">
    @inertia
</body>

</html>
