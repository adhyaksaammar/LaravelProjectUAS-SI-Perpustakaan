@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div>
				<a href="{{ route('peminjaman.create') }}" class="btn-sm btn-success">Tambah Data Peminjaman</a>
			</div>
			<br>
			<div class="card">
				<div class="card-header">
				    <h2>Data Peminjaman</h2>
				</div>
				<div class="card-body">
					<table class="table table-striped" id="tabel">
						<thead>
							<tr>
								<th>No Pinjam</th>
								<th>ID Anggota</th>
								<th>ID Buku</th>
								<th>Tanggal Pinjam</th>
								<th>Lama Pinjam</th>
								<th>Tanggal Kembali</th>
								<th>ID Pegawai</th>
								<th>Aksi</th>
							</tr>	
						</thead>
						<tbody>
							@foreach ($datas as $data)
								<tr>
									<td>{{ $data->no_pinjam }}</td>
									<td>{{ $data->id_anggota }}</td>
									<td>{{ $data->id_buku }}</td>
									<td>{{ $data->tanggal_pinjam }}</td>
									<td>{{ $data->lama_pinjam }}</td>
									<td>{{ $data->tanggal_kembali }}</td>
									<td>{{ $data->id_pegawai }}</td>
									<td>
										<a href="{{ route('peminjaman.edit',['id'=>$data->id]) }}" class="btn-sm btn-warning">Edit</a>
										<form action="{{ route('peminjaman.destroy',['id'=>$data->id]) }}" method="POST">
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