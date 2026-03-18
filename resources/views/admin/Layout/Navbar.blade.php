<nav class="navbar">
    <div class="nav-container">
        <div class="nav-brand">
            <div class="brand-wrapper">
                <img src="https://e-izin.smkn4padalarang.sch.id/logo1.png" alt="icon_smkn" class="logo">
            <a href="{{ url('/dashboard') }}">Informasi Jurusan PPLG</a>
            </div>
        </div>

        <ul class="nav-menu">
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('admin/siswa') }}">Siswa</a></li>
            <li><a href="{{ url('admin/guru') }}">Guru</a></li>
            <li><a href="{{ url('admin/mapel') }}">Mapel</a></li>
            <li><a href="{{ url('admin/mapeldiampu') }}">Mapel Diampu</a></li>
            <li><a href="{{ url('admin/kelas') }}">Kelas</a></li>
            <li><a href="{{ url('admin/berita') }}">Berita</a></li>
            <li><a href="{{ url('admin/nilai') }}">Nilai</a></li>
        </ul>
    </div>
</nav>