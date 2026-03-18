@extends('admin.Layout.AdminNavbar')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.8.2/docx.umd.min.js"></script>
<div class="container">
    <h1>Data Siswa</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahsiswa') }}" class="btn-primary">+ Tambah Siswa</a>{{ csrf_field() }}
        <button onclick="exportPDF()" class="export">Export PDF</button>
    </div>
    
    <div class="search-section">
        <p>Cari Data Siswa :</p>
        <form action="{{url('admin/siswa/cari')}}" method="GET">
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
        @forelse ($arraysiswa as $key => $siswa)
        <div class="data-card">
            <div class="card-number">{{ $key + 1 }}</div>
            
            @if($siswa->foto)
            <img src="{{ $siswa->foto }}" alt="{{ $siswa->nama }}" class="card-image">
            @endif
            
            <div class="card-content">
                <div class="card-field">
                    <span class="field-label">NISN</span>
                    <span class="field-value">{{ $siswa->nisn }}</span>
                </div>
                
                <div class="card-field">
                    <span class="field-label">Nama</span>
                    <span class="field-value">{{ $siswa->nama }}</span>
                </div>
                
                <div class="card-field">
                    <span class="field-label">Jenis Kelamin</span>
                    <span class="field-value">{{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                </div>
                
                <div class="card-field">
                    <span class="field-label">Tanggal Lahir</span>
                    <span class="field-value">{{ $siswa->tanggal_lahir }}</span>
                </div>
                
                <div class="card-field">
                    <span class="field-label">ID Siswa</span>
                    <span class="field-value">{{ $siswa->id_siswa }}</span>
                </div>
                
                <div class="card-field">
                    <span class="field-label">Kelas</span>
                    <span class="field-value">{{ $siswa->kelas->nama_kelas ?? '-' }}</span>
                </div>
                
                <div class="card-field">
                    <span class="field-label">Alamat</span>
                    <span class="field-value">{{ $siswa->alamat }}</span>
                </div>
                
                <div class="card-field">
                    <span class="field-label">No HP</span>
                    <span class="field-value">{{ $siswa->no_hp }}</span>
                </div>
            </div>
            
            <div class="card-actions">
                <a href="{{url('admin/editsiswa/'.$siswa->id_siswa)}}" class="btn-edit">Edit</a>
                <a href="{{url('admin/hapussiswa/'.$siswa->id_siswa)}}" class="btn-delete">Hapus</a>
            </div>
        </div>

        @empty

        <div class="not-found">
            Data Tidak Ditemukan
        </div>

        @endforelse
    </div>
</div>
<table id="exportTable" style="display: none">
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>ID Siswa</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>No HP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arraysiswa as $key => $siswa)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $siswa->tanggal_lahir }}</td>
            <td>{{ $siswa->id_siswa }}</td>
            <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>{{ $siswa->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    
    function getVisibleRows() { return [...document.querySelectorAll('#exportTable tbody tr')].filter(r => r.style.display !== 'none'); }
    function getTableHead()   { return [...document.querySelectorAll('#exportTable thead th')].map(th => th.textContent); }
    function getTableData()   { return getVisibleRows().map(tr => [...tr.querySelectorAll('td')].map(td => td.textContent.trim())); }
    function exportPDF() {
    const { jsPDF } = window.jspdf; const doc = new jsPDF();
    doc.setFontSize(14); doc.text('Data Siswa', 14, 15);
    doc.autoTable({ startY:22, head:[getTableHead()], body:getTableData(), styles:{fontSize:10,cellPadding:4}, headStyles:{fillColor:[103,184,227]} });
    doc.save('data_siswa.pdf');
}
</script>
@endsection