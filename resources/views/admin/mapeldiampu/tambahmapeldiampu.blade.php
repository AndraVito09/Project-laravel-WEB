@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>TAMBAH DATA MAPEL DIAMPU</h3>
	<form method="post" action="{{ url('admin/mapeldiampu/store') }}">@csrf
<table>
			<tr>
				<td>Guru</td>
				<td><select name="id_guru" required>
    ‎           <option value="">-----</option>
                @foreach($guru as $g)
                <option value="{{$g->id_guru}}">{{ $g->id_guru}} - {{$g->nama}}</option>
                @endforeach
            </select>
            </td>
			</tr>
			<tr>
				<td>Mapel</td>
				<td><select name="id_mapel" required>
    ‎           <option value="">----</option>
                @foreach($mapel as $m)
                <option value="{{$m->id_mapel}}">{{ $m->id_mapel}} - {{$m->nama_mapel}}</option>
                @endforeach
            </select></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><select name="id_kelas" required>
    ‎           <option value="">Pilih Kelas</option>
                @foreach($kelas as $k)
                <option value="{{$k->id_kelas}}">{{ $k->id_kelas}} - {{$k->nama_kelas}}</option>
                @endforeach
            </select></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
			<tr>
					<td></td>
					<td><a href="{{url('admin/mapeldiampu')}}" class="btn-back">batal</a></td>
				</tr>
		</table>
	</form>
</div>
</div>
@endsection