@extends('admin.Layout.AdminNavbar')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.8.2/docx.umd.min.js"></script>
<div class="container">
    <h1>Data Mata Pelajaran</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahmapel') }}" class="btn-primary">+ Tambah Mapel</a>{{ csrf_field() }}
        <button onclick="exportPDF()">PDF</button>
    </div>
    
    <div class="search-section">
        <p>Cari Data Mapel :</p>
        <form action="{{url('admin/mapel/cari')}}" method="GET">
            <input type="text" name="cari" placeholder="Cari mapel.." value="{{ old('cari') }}">
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
        @forelse ($arraymapel as $key => $mapel)
        <div class="data-card">
            <div class="card-number">{{ $key + 1 }}</div>
            
            <div class="card-content">

                <div class="card-field">
                    <span class="field-label">ID Mapel</span>
                    <span class="field-value">{{ $mapel->id_mapel }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">Nama Mapel</span>
                    <span class="field-value">{{ $mapel->nama_mapel }}</span>
                </div>

                <div class="card-field">
                    <span class="field-label">kategori</span>
                    <span class="field-value">{{ $mapel->kategori }}</span>
                </div>

            </div>
            
            <div class="card-actions">
                <a href="{{url('admin/editmapel/'.$mapel->id_mapel)}}" class="btn-edit">Edit</a>
                <a href="{{url('admin/hapusmapel/'.$mapel->id_mapel)}}" class="btn-delete">Hapus</a>
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
    <thead><tr><th>No</th><th>Nama Mapel</th><th>Kategori</th></tr></thead>
    <tbody>
        @foreach ($arraymapel as $key => $mapel)
        <tr data-search="{{ strtolower($mapel->nama_mapel . ' ' . $mapel->kategori) }}"
            data-kategori="{{ strtolower($mapel->kategori) }}">
            <td>{{ $key+1 }}</td>
            <td>{{ $mapel->nama_mapel }}</td>
            <td>{{ $mapel->kategori }}</td>
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
    doc.setFontSize(14); doc.text('Data Mata Pelajaran', 14, 15);
    doc.autoTable({ startY:22, head:[getTableHead()], body:getTableData(), styles:{fontSize:10,cellPadding:4}, headStyles:{fillColor:[102,126,234]} });
    doc.save('data_mapel.pdf');
}
</script>
@endsection