<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{secure_asset('css/login.css')}}">
</head>
<body>

    @if(session('status'))
    <script>
        alert("{{ session('status') }}");
    </script>
    @endif

    @if (session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
        
    @endif

    <div class="login-container">
        <h3 class="text-center mb-4">LOGIN</h3>

        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Login</button>
            <div class="text-center mt-3">
                <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
            </div>
        </form>
    </div>

</body>
</html>
