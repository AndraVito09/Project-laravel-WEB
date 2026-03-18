<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width:100%;
            border-collapse: collapse;
        }
        table, th, td {
            border:1px solid black;
        }
        th, td {
            padding:6px;
            text-align:left;
        }
    </style>
</head>
<body>

<h3>Data Mapel</h3>

<table>
    <thead>
        <tr>
        <th>No</th>
        <th>ID Mapel</th>
        <th>Nama Mapel</th>
        <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mapel as $key => $m)
        <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $m->id_mapel }}</td>
        <td>{{ $m->nama_mapel }}</td>
        <td>{{ $m->kategori }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
