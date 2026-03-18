@extends('admin.Layout.AdminNavbar')
@section('content')

<style>
body {
    background: linear-gradient(135deg, #e3f2fd, #ffffff);
}

.form-container {
    max-width: 500px;
    margin: 80px auto;
    background: #ffffff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    text-align: center;
    transition: 0.3s ease;
}

.form-container:hover {
    transform: translateY(-5px);
}

.form-container h2 {
    margin-bottom: 30px;
    font-weight: 600;
    color: #2c3e50;
}

button {
    background: #3498db;
    border: none;
    padding: 12px 25px;
    color: white;
    font-size: 15px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
}

button:hover {
    background: #2980b9;
    transform: scale(1.05);
}

button:active {
    transform: scale(0.98);
}
</style>

<div class="form-container">
    <h2>Selamat Datang <br> {{ Auth::user()->username }}</h2>
    
    <form method="POST" action="{{ url('logout')}}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

@endsection
