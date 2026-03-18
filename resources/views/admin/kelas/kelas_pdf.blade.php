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

<h3>Data Kelas</h3>

<table>
    <thead>
        <tr>
        <th>No</th>
        <th>ID Kelas</th>
        <th>Nama Kelas</th>
        <th>Jurusan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas as $key => $k)
        <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $k->id_kelas }}</td>
        <td>{{ $k->nama_kelas }}</td>
        <td>{{ $k->jurusan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
