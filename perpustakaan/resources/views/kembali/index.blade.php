@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div>
				<a href="{{ route('kembali.create') }}" class="btn-sm btn-success">Tambah Data Pengembalian</a>
			</div>
			<br>
			<div class="card">
				<div class="card-header">
				    <h2>Data Pengembalian</h2>
				</div>
				<div class="card-body">
					<table class="table table-striped" id="tabel">
						<thead>
							<tr>
								<th>No</th>
								<th>No. Pengembalian</th>
								<th>No. Pinjam</th>
								<th>Buku</th>
								<th>Tanggal Pinjam</th>
								<th>Jatuh Tempo</th>
								<th>Tanggal Pengembalian</th>
								<th>Status</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>	
						</thead>
						<tbody>

							@php
								$no = 1
							@endphp
							@foreach ($data as $datas)
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $datas->no }}</td>
									<td>{{ $datas->no_pinjam }}</td>
									<td>{{ $datas->id_buku }}</td>
									<td>{{ $datas->tanggal_pinjam }}</td>
									<td>{{ $datas->tanggal_kembali }}</td>
									<td>{{ $datas->tanggal_pengembalian }}</td>
									<td>{{ $datas->status }}</td>
									<td>{{ $datas->keterangan }}</td>
									<td>
										<a href="{{ route('kembali.show',['id'=>$datas->id]) }}" class="btn-sm btn-warning">Detail</a>
									</td>
								</tr>
									@php
										$no++
									@endphp
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