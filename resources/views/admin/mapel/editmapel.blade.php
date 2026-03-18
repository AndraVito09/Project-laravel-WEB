@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>EDIT DATA MATA PELAJARAN</h3>
	<form method="post" action="{{ url('admin/mapel/update') }}"> {{ csrf_field() }}
<table>
			<tr>			
				<td></td>
				<td><input type="hidden" name="id_mapel" value="{{$mapel->id_mapel}}"></td>
			</tr>
			<tr>
				<td>Nama Mapel</td>
				<td><input type="text" name="nama_mapel" value="{{$mapel->nama_mapel}}" required></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td><select name="kategori" required>
						<option value="Produktif" @if($mapel->kategori == 'produktif') selected @endif>produktif</option>
						<option value="Adaptif" @if($mapel->kategori == 'Adaptif') selected @endif>Adaptif</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</tr>
			<tr>
					<td></td>
					<td><a href="{{url('admin/mapel')}}" class="btn-back">batal</a></td>
				</tr>		
		</table>
	</form>
</div>
</div>
@endsection