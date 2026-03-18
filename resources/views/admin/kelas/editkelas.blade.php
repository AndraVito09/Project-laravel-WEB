@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>EDIT DATA KELAS</h3>
	<form method="post" action="{{ url('admin/kelas/update') }}"> {{ csrf_field() }}
<table>
			<tr>			
				<td><input type="hidden" name="id_kelas" value="{{$kelas->id_kelas}}"></td>
			</tr>
			<tr>
				<td>Nama Kelas</td>
				<td><input type="text" name="nama_kelas" value="{{$kelas->nama_kelas}}" required></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><input type="text" name="jurusan" value="{{$kelas->jurusan}}" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</tr>
			<tr>
					<td></td>
					<td><a href="{{url('admin/kelas')}}" class="btn-back">batal</a></td>
				</tr>	
		</table>
	</form>
</div>
</div>
@endsection