@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>EDIT DATA NILAI</h3>
	<form method="post" action="{{ url('admin/nilai/update') }}"> {{ csrf_field() }}
<table>
			<tr>			
				<td></td>
				<td><input type="hidden" name="id_nilai" value="{{$nilai->id_nilai}}"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><select name="id_siswa" required>
    ‎           <option value="">----</option>
                @foreach($siswa as $s)
                @php $selected = ($s->id_siswa == $nilai->id_siswa) ? 'selected' : ''; @endphp
                <option value="{{$s->id_siswa}}" {{$selected}}>{{$s->nama}}</option>
                @endforeach
            </select>
            </td>
			</tr>
			<tr>
				<td>Mapel Ampu</td>
				<td><select name="id_ampu" required>
    ‎           <option value="">----</option>
                @foreach($mapeldiampu as $ma)
                @php $selected = ($ma->id_ampu == $nilai->id_ampu) ? 'selected' : ''; @endphp
                <option value="{{$ma->id_ampu}}" {{$selected}}>{{ $ma->id_ampu}} - {{$ma->nama_mapel}} - {{$ma->nama}}</option>
                @endforeach
            </select></td>
			</tr>
       <tr>
				<td>Semester</td>
				<td><input type="text" name="semester" value="{{$nilai->semester}}" required></td>
			</tr>
            <tr>
				<td>Nilai Tugas</td>
				<td><input type="float" name="nilai_tugas" value="{{$nilai->nilai_tugas}}"></td>
			</tr>
            <tr>
				<td>Nilai UTS</td>
				<td><input type="float" name="nilai_uts" value="{{$nilai->nilai_uts}}"></td>
			</tr>
			<tr>
				<td>Nilai Akhir</td>
				<td><input type="float" name="nilai_akhir" value="{{$nilai->nilai_akhir}}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</tr>
			<tr>
				<td><a href="{{url('admin/nilai')}}" class="btn-back">Batal</a></td>
			</tr>
		</table>
	</form>
</div>
</div>
@endsection