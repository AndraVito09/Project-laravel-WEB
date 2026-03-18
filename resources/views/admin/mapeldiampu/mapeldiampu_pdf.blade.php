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

<h3>Data Mapel diampu</h3>

<table>
    <thead>
        <tr>
        <th>No</th>
        <th>ID Ampu</th>
        <th>ID Guru</th>
        <th>ID Mapel</th>
        <th>ID Kelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mapeldiampu as $key => $mp)
        <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $mp->id_ampu }}</td>
        <td>{{ $mp->id_guru }}</td>
        <td>{{ $mp->id_mapel }}</td>
        <td>{{ $mp->id_kelas }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
