@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>EDIT DATA MAPEL DIAMPU</h3>
	<form method="post" action="{{ url('admin/mapeldiampu/update') }}"> {{ csrf_field() }}
<table>
			<tr>			
				<td><input type="hidden" name="id_ampu" value="{{$mapeldiampu->id_ampu}}"></td>
			</tr>
			<tr>
				<td>Guru</td>
				<td><select name="id_guru" required>
    ‎           <option value="">-----</option>
                @foreach($guru as $g)
                @php $selected = ($g->id_guru == $mapeldiampu->id_guru) ? 'selected' : ''; @endphp
                <option value="{{$g->id_guru}}" {{$selected}}>{{ $g->id_guru}} - {{$g->nama}}</option>
                @endforeach
            </select>
            </td>
			</tr>
			<tr>
				<td>Mapel</td>
				<td><select name="id_mapel" required>
    ‎           <option value="">----</option>
                @foreach($mapel as $m)
                @php $selected = ($m->id_mapel == $mapeldiampu->id_mapel) ? 'selected' : ''; @endphp
                <option value="{{$m->id_mapel}}" {{$selected}}>{{ $m->id_mapel}} - {{$m->nama_mapel}}</option>
                @endforeach
            </select></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><select name="id_kelas" required>
    ‎           <option value="">Pilih Kelas</option>
                @foreach($kelas as $k)
                @php $selected = ($k->id_kelas == $mapeldiampu->id_kelas) ? 'selected' : ''; @endphp
                <option value="{{$k->id_kelas}}" {{$selected}}>{{ $k->id_kelas}} - {{$k->nama_kelas}}</option>
                @endforeach
            </select></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
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