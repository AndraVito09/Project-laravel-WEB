@extends('admin.Layout.AdminNavbar')
@section('content')
<div class="container">
    <h1>Data Berita</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahberita') }}" class="btn-primary">+ Tambah Berita</a>{{ csrf_field() }}
        <a href="{{ route('berita.export.pdf') }}" target="_blank">Export PDF</a>
    </div>
    
    <div class="search-section">
        <p>Cari Data Berita :</p>
        <form action="{{url('admin/berita/cari')}}" method="GET">
            <input type="text" name="cari" placeholder="Cari berita.." value="{{ old('cari') }}">
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
        @forelse ($arrayberita as $key => $berita)
        <div class="data-card">
            <div class="card-number">{{ $key + 1 }}</div>
            
            @if($berita->foto ?? false)
            <img src="{{ $berita->foto }}" alt="{{ $berita->nama ?? 'Image' }}" class="card-image">
            @endif

            <div class="card-content">

                <div class="card-field">
                    <span class="field-label">ID Berita</span>
                    <span class="field-value">{{ $berita->id_berita }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Judul</span>
                    <span class="field-value">{{ $berita->judul }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Isi</span>
                    <span class="field-value">{{ $berita->isi }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Tanggal</span>
                    <span class="field-value">{{ $berita->tanggal_post }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">dipost oleh :</span>
                    <span class="field-value">{{ $berita->guru->nama ?? '-'}}</span>
                </div>

            </div>
            
            <div class="card-actions">
                <a href="{{url('admin/editberita/'.$berita->id_berita)}}" class="btn-edit">Edit</a>
                <a href="{{url('admin/hapusberita/'.$berita->id_berita)}}" class="btn-delete">Hapus</a>
            </div>
        </div>

        @empty

        <div class="not-found">
            Data tidak ditemukan
        </div>

        @endforelse
    </div>
</div>
@endsection