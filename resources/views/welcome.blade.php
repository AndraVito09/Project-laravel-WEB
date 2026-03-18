<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta charset="UTF-8">

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #4ca1d3, #67b8e3);
        }

        .card {
            background: #f4f4f4;
            padding: 40px;
            width: 380px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .card img {
            width: 100px;
            margin-bottom: 20px;
        }

        .card h1 {
            margin: 10px 0;
            color: #2c3e50;
        }

        .card p {
            color: #555;
        }

    </style>
</head>
<body>

    <div class="card">
        <img src="https://e-izin.smkn4padalarang.sch.id/logo1.png" alt="Logo Sekolah">

        <h1>Selamat Datang</h1>
        <p>Sistem Informasi Jurusan PPLG</p>

    <script>
        setTimeout(function() {
            window.location.href = "/login";
        }, 3000); 
    </script>

</body>
</html>
