@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>EDIT DATA GURU</h3>
	<form method="post" action="{{ url('admin/guru/update') }}"> {{ csrf_field() }}
<table>
			<tr>			
				<td><input type="hidden" name="id_guru" value="{{$guru->id_guru}}"></td>
			</tr>
			<tr>
				<td>NIP</td>
				<td><input type="text" name="nip" value="{{$guru->nip}}" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="{{$guru->nama}}" required></td>
			</tr>
			<tr>
				<td>Jenis kelamin</td>
				<td><select name="jenis_kelamin" required>
						<option value="Laki-laki" @if($guru->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
						<option value="Perempuan" @if($guru->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
					</select>
				</td>
			</tr>
      <tr>
				<td>Email</td>
				<td><input type="text" name="email" value="{{$guru->email}}"></td>
			</tr>
			<tr>
				<td>No Hp</td>
				<td><input type="text" name="no_hp" value="{{$guru->no_hp}}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</tr>
			<tr>
					<td></td>
					<td><a href="{{url('admin/guru')}}" class="btn-back">batal</a></td>
				</tr>				
		</table>
	</form>
</div>
</div>
@endsection