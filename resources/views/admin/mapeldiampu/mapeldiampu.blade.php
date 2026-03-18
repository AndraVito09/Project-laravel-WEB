@extends('admin.Layout.AdminNavbar')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.8.2/docx.umd.min.js"></script>
<div class="container">
    <h1>Data Mapel Diampu</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahmapeldiampu') }}" class="btn-primary">+ Tambah Mapel Diampu</a>{{ csrf_field() }}
        <button onclick="exportPDF()" class="export">Export PDF</button>
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
<table id="exportTable" style="display: none">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Guru</th>
            <th>Mapel</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arraymapeldiampu as $key => $mapeldiampu)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $mapeldiampu->id_ampu }}</td>
            <td>{{ $mapeldiampu->guru->nama }}</td>
            <td>{{ $mapeldiampu->mapel->nama_mapel }}</td>
            <td>{{ $mapeldiampu->kelas->nama_kelas }}</td>
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
    doc.setFontSize(14); doc.text('Data Mapel diampu', 14, 15);
    doc.autoTable({ startY:22, head:[getTableHead()], body:getTableData(), styles:{fontSize:10,cellPadding:4}, headStyles:{fillColor:[102,126,234]} });
    doc.save('data_Mapeldiampu.pdf');
}
</script>
@endsection