@extends('admin.Layout.AdminNavbar')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.8.2/docx.umd.min.js"></script>
<div class="container">
    <h1>Data Guru</h1>
    
    <div class="header-actions">
        <a href="{{ url('admin/tambahguru') }}" class="btn-primary">+ Tambah Guru</a>{{ csrf_field() }}
        <button onclick="exportPDF()" class="export">Export PDF</button>
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
<table id="exportTable" style="display: none">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Guru</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>NO HP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arrayguru as $key => $guru)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $guru->id_guru }}</td>
            <td>{{ $guru->nip }}</td>
            <td>{{ $guru->nama }}</td>
            <td>{{ $guru->jenis_kelamin }}</td>
            <td>{{ $guru->email }}</td>
            <td>{{ $guru->no_hp }}</td>
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