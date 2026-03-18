<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ secure_asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/form-style.css') }}">
</head>

<body>

@include('admin.Layout.Navbar')

<div class="admin-layout">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ secure_asset('js/alert.js') }}"></script>
</body>
</html>