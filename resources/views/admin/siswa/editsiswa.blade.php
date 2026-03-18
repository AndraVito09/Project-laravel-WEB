@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
<h3>EDIT DATA Siswa</h3>
		<form method="post" action="{{ url('/admin/siswa/update') }}">
        {{ csrf_field() }}
			<table>
				<tr>			
					<td>NISN</td>
					<td><input type="text" name="nisn" value="{{$siswa->nisn}}" required></td>
				</tr>
				<tr>
					<td>NAMA</td>
					<td><input type="text" name="nama" value="{{$siswa->nama}}" required></td>
				</tr>
				<tr>
					<td>Jenis kelamin</td>
					<td><select name="jk" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" @if($siswa->jk == 'L') selected @endif>Laki-laki</option>
                    <option value="P" @if($siswa->jk == 'P') selected @endif>Perempuan</option>
                </select>
					</td>
				</tr>
            <tr>
					<td>Tanggal lahir</td>
					<td><input type="date" name="tanggal_lahir" value="{{$siswa->tanggal_lahir}}" required></td>
				</tr>
            <tr>
					<td>Foto</td>
					<td><input type="text" name="foto" value="{{$siswa->foto}}"></td>
				</tr>
            <tr>
					<td></td>
					<td><input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}"></td>
				</tr>
				<tr>
					<td>ID Kelas</td>
					<td><select id="id_kelas" name="id_kelas" value="{{$siswa->id_siswa}}" required>
                @foreach($arraykelas as $k)
                @php $selected = ($k->id_kelas == $siswa->id_kelas) ? 'selected' : ''; @endphp
                <option value="{{$k->id_kelas}}" {{$selected}}>{{ $k->id_kelas}} - {{$k->nama_kelas}}</option>
                @endforeach
            </select>
        </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><input type="text" name="alamat" value="{{$siswa->alamat}}"></td>
				</tr>
				<tr>
					<td>No Hp</td>
					<td><input type="int" name="no_hp" value="{{$siswa->no_hp}}"></td>
				</tr>
				<tr>
					<td></td>
					<td>
‎<input type="submit" value="Update"></td>
				</tr>
				<tr>
					<td></td>
					<td><a href="{{url('admin/siswa')}}" class="btn-back">batal</a></td>
				</tr>						
			</table>
		</form>
</div>
</div>
@endsection