@extends('admin.Layout.AdminNavbar')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.8.2/docx.umd.min.js"></script>
<div class="container">
    <h1>Data Berita</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahberita') }}" class="btn-primary">+ Tambah Berita</a>{{ csrf_field() }}
        <button onclick="exportPDF()" class="export">Export PDF</button>
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
<table id="exportTable" style="display: none">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Berita</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal</th>
            <th>dipost Oleh:</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arrayberita as $key => $berita)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $berita->id_berita }}</td>
            <td>{{ $berita->judul }}</td>
            <td>{{ $berita->isi }}</td>
            <td>{{ $berita->tanggal_post }}</td>
            <td>{{ $berita->guru->nama }}</td>
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
    doc.setFontSize(14); doc.text('Data Guru', 14, 15);
    doc.autoTable({ startY:22, head:[getTableHead()], body:getTableData(), styles:{fontSize:10,cellPadding:4}, headStyles:{fillColor:[102,126,234]} });
    doc.save('data_guru.pdf');
}
</script>
@endsection