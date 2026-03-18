@extends('admin.Layout.AdminNavbar')
@section('content')
<div class="container">
    <h1>Data Nilai</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahnilai') }}" class="btn-primary">+ Tambah Nilai</a>{{ csrf_field() }}
        <a href="{{ route('nilai.export.pdf') }}" target="_blank">Export PDF</a>
    </div>
    
    <div class="search-section">
        <p>Cari Data Nilai :</p>
        <form action="{{url('admin/nilai/cari')}}" method="GET">
            <input type="text" name="cari" placeholder="Cari siswa.." value="{{ old('cari') }}">
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
        @forelse ($arraynilai as $key => $nilai)
        <div class="data-card">
            <div class="card-number">{{ $key + 1 }}</div>
            
            <div class="card-content">

                <div class="card-field">
                    <span class="field-label">ID Nilai</span>
                    <span class="field-value">{{ $nilai->id_nilai }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Siswa</span>
                    <span class="field-value">{{ $nilai->siswa->nama ?? 'Data Tidak Ada' }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Mapel diampu</span>
                    <span class="field-value">{{ $nilai->ampu->mapel->nama_mapel ?? '-' }} - {{ $nilai->ampu->guru->nama }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Semester</span>
                    <span class="field-value">{{ $nilai->semester }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Nilai Tugas</span>
                    <span class="field-value">{{ $nilai->nilai_tugas }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Nilai UTS</span>
                    <span class="field-value">{{ $nilai->nilai_uts }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Nilai Akhir</span>
                    <span class="field-value">{{ $nilai->nilai_akhir }}</span>
                </div>

            </div>
            
            <div class="card-actions">
                <a href="{{url('admin/editnilai/'.$nilai->id_nilai)}}" class="btn-edit">Edit</a>
                <a href="{{url('admin/hapusnilai/'.$nilai->id_nilai)}}" class="btn-delete">Hapus</a>
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