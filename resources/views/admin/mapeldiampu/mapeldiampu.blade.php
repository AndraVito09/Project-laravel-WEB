@extends('admin.Layout.AdminNavbar')
@section('content')
<div class="container">
    <h1>Data Mapel Diampu</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahmapeldiampu') }}" class="btn-primary">+ Tambah Mapel Diampu</a>{{ csrf_field() }}
        <a href="{{ route('mapeldiampu.export.pdf') }}" target="_blank">Export PDF</a>
    </div>
    
    <div class="search-section">
        <p>Cari Data Mapel Diampu :</p>
        <form action="{{url('admin/mapeldiampu/cari')}}" method="GET">
            <input type="text" name="cari" placeholder="Cari mapel diampu.." value="{{ old('cari') }}">
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
        @forelse ($arraymapeldiampu as $key => $mapeldiampu)
        <div class="data-card">
            <div class="card-number">{{ $key + 1 }}</div>
            
            <div class="card-content">

                <div class="card-field">
                    <span class="field-label">ID</span>
                    <span class="field-value">{{ $mapeldiampu->id_ampu }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Guru</span>
                    <span class="field-value">{{ $mapeldiampu->guru->nama }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Mapel</span>
                    <span class="field-value">{{ $mapeldiampu->mapel->nama_mapel }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Kelas</span>
                    <span class="field-value">{{ $mapeldiampu->kelas->nama_kelas }}</span>
                </div>

            </div>
            
            <div class="card-actions">
                <a href="{{url('admin/editmapeldiampu/'.$mapeldiampu->id_ampu)}}" class="btn-edit">Edit</a>
                <a href="{{url('admin/hapusmapeldiampu/'.$mapeldiampu->id_ampu)}}" class="btn-delete">Hapus</a>
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