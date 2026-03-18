@extends('admin.Layout.AdminNavbar')
@section('content')
<div class="container">
    <h1>Data Kelas</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahkelas') }}" class="btn-primary">+ Tambah Kelas</a>{{ csrf_field() }}
        <a href="{{ route('kelas.export.pdf') }}" target="_blank">Export PDF</a>
    </div>
    
    <div class="search-section">
        <p>Cari Data Kelas :</p>
        <form action="{{url('admin/kelas/cari')}}" method="GET">
            <input type="text" name="cari" placeholder="Cari kelas.." value="{{ old('cari') }}">
            <input type="submit" value="CARI">
        </form>
    </div>
    
    <x-alert />
    
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif
    
    <div class="cards-grid">
        @forelse ($arraykelas as $key => $kelas)
        <div class="data-card">
            <div class="card-number">{{ $key + 1 }}</div>
            
            <div class="card-content">

                <div class="card-field">
                    <span class="field-label">ID Kelas</span>
                    <span class="field-value">{{ $kelas->id_kelas }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Nama Kelas</span>
                    <span class="field-value">{{ $kelas->nama_kelas }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Jurusan</span>
                    <span class="field-value">{{ $kelas->jurusan }}</span>
                </div>

            </div>
            
            <div class="card-actions">
                <a href="{{url('admin/editkelas/'.$kelas->id_kelas)}}" class="btn-edit">Edit</a>
                <a href="{{url('admin/hapuskelas/'.$kelas->id_kelas)}}" class="btn-delete">Hapus</a>
            </div>
        </div>
        @empty
        <div class="not-found">
            Data Tidak Ditemukan
        </div>
        @endforelse
    </div>
</div>
@endsection