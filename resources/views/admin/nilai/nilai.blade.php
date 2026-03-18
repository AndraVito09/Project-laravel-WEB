@extends('admin.Layout.AdminNavbar')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.8.2/docx.umd.min.js"></script>
<div class="container">
    <h1>Data Nilai</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahnilai') }}" class="btn-primary">+ Tambah Nilai</a>{{ csrf_field() }}
        <button onclick="exportPDF()" class="export">Export PDF</button>
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
<table id="exportTable" style="display: none">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Nilai</th>
            <th>Siswa</th>
            <th>Mapel diampu</th>
            <th>Semester</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arraynilai as $key => $nilai)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $nilai->id_nilai }}</td>
            <td>{{ $nilai->siswa->nama }}</td>
            <td>{{ $nilai->ampu->mapel->nama_mapel }}</td>
            <td>{{ $nilai->semester }}</td>
            <td>{{ $nilai->nilai_tugas }}</td>
            <td>{{ $nilai->nilai_uts }}</td>
            <td>{{ $nilai->nilai_akhir }}</td>
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
    doc.setFontSize(14); doc.text('Data Nilai', 14, 15);
    doc.autoTable({ startY:22, head:[getTableHead()], body:getTableData(), styles:{fontSize:10,cellPadding:4}, headStyles:{fillColor:[102,126,234]} });
    doc.save('data_nilai.pdf');
}
</script>
@endsection