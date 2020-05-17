@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div>
				<a href="{{ route('pegawai.create') }}" class="btn-sm btn-success">Tambah Data Pegawai</a>
			</div>
			<br>
			<div class="card">
				<div class="card-header">
				    <h2>Data Pegawai</h2>
				</div>
				<div class="card-body">
					<table class="table table-striped" id="tabel">
						<thead>
							<tr>
								<th>Id Pegawai</th>
								<th>Nama Pegawai</th>
								<th>Jenis Kelamin</th>
								<th>No HP</th>
								<th>Alamat</th>
								<th>Aksi</th>
							</tr>	
						</thead>
						<tbody>
							@foreach ($datas as $data)
								<tr>
									<td>{{ $data->id_pegawai }}</td>
									<td>{{ $data->nama }}</td>
									<td>{{ $data->jenis_kelamin }}</td>
									<td>{{ $data->no_hp }}</td>
									<td>{{ $data->alamat }}</td>
									<td>
										<a href="{{route('pegawai.edit',['id'=>$data->id])}}" class="btn-sm btn-warning">Edit</a>
										<form action="{{route('pegawai.destroy',['id'=>$data->id])}}" method="POST">
												{{ csrf_field() }} 
												<input type="hidden" name="_method" value="DELETE">
												<button type="submit" class="btn-sm btn-danger">Hapus</button>
										</form>
									</td>
								</tr>
							@endforeach	
						</tbody>						
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
        $('#tabel').DataTable();
    });
</script>

@endsection