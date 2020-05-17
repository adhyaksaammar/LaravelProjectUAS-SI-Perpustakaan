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
					{{ csrf_field() }}
					<table class="table table-striped" id="tabel">	
						<thead>
							<tr>
								<th>No</th>
								<th>No. Pinjam</th>
								<th>Jatuh Tempo</th>
								<th>Tanggal Pengembalian</th>
								<th>Terlambat/Hari</th>
								<th>Bayar</th>
							</tr>	
						</thead>
						<tbody>

							@php
								$no = 1
							@endphp
							@foreach ($data as $datas)
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $datas->no_pinjam }}</td>
									<td>{{ $datas->tanggal_kembali }}</td>
									<td>{{ $datas->tanggal_pengembalian }}</td>
									<td>{{ $datas->terlambat }} Hari</td>
									<td>
										<button type="button" onclick="bayar({{$datas->id_kembali}})" name="button">Bayar</button>
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
		function bayar(id) {
			var token = $("input[name='_token']").val();
			$.ajax({
				url: "{{route('denda.store')}}",
				method: 'POST',
				data: {id:id, _token:token},
				success: function (res){
					console.log(res);
				}
			})
		}
	    $(document).ready(function(){
	        $('#tabel').DataTable();
	    });
	</script>

@endsection

@push("script")
	
@endpush