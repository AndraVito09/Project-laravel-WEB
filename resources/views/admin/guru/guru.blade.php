@extends('admin.Layout.AdminNavbar')
@section('content')
<div class="container">
    <h1>Data Guru</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahguru') }}" class="btn-primary">+ Tambah Guru</a>{{ csrf_field() }}
        <a href="{{ route('guru.export.pdf') }}" target="_blank">Export PDF</a>
    </div>
    
    <div class="search-section">
        <p>Cari Data Guru :</p>
        <form action="{{url('admin/guru/cari')}}" method="GET">
            <input type="text" name="cari" placeholder="Cari guru.." value="{{ old('cari') }}">
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
        @forelse ($arrayguru as $key => $guru)
        <div class="data-card">
            <div class="card-number">{{ $key + 1 }}</div>
            
            @if($guru->foto ?? false)
            <img src="{{ $guru->foto }}" alt="{{ $guru->nama ?? 'Image' }}" class="card-image">
            @endif

            <div class="card-content">

                <div class="card-field">
                    <span class="field-label">ID Guru</span>
                    <span class="field-value">{{ $guru->id_guru }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">NIP</span>
                    <span class="field-value">{{ $guru->nip }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Nama</span>
                    <span class="field-value">{{ $guru->nama }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Jenis Kelamin</span>
                    <span class="field-value">{{ $guru->jenis_kelamin }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Email</span>
                    <span class="field-value">{{ $guru->email }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">NO HP</span>
                    <span class="field-value">{{ $guru->no_hp }}</span>
                </div>

            </div>
            
            <div class="card-actions">
                <a href="{{url('admin/editguru/'.$guru->id_guru)}}" class="btn-edit">Edit</a>
                <a href="{{url('admin/hapusguru/'.$guru->id_guru)}}" class="btn-delete">Hapus</a>
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