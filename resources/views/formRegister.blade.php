<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ secure_asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    @if (session ('error'))
    <script>
        alert("{{ session ('error') }}");
    </script>
        
    @endif
        <div class="login-container">
            <h3 class="text-center mb-4">REGISTER</h3>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>

                <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

                <div class="input-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-success w-100">Register</button>
            </form>

            <div class="text-center">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
            </div>
        </div>
    </div>
</body>
</html>