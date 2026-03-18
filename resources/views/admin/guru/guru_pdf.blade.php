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

<h3>Data Guru</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
        <th>ID_guru</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>NO HP</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guru as $key => $g)
        <tr>
           <td>{{ $key + 1 }}</td>
        <td>{{ $g->id_guru }}</td>
        <td>{{ $g->nip }}</td>
        <td>{{ $g->nama }}</td>
        <td>{{ $g->jenis_kelamin }}</td>
        <td>{{ $g->email }}</td>
        <td>{{ $g->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
