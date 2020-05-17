@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		
		<div class="col-md-6">
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Peminjaman</h3>
	            </div>

	            <!-- /.box-header -->
	            <div class="box-body">
	            	<form action="{{ route('peminjaman.store') }}" method="POST">

			  			{{ csrf_field() }}

			  				<h3>Data Peminjam</h3>

			  			<div class="form-group">
						    <label for="id_anggota">ID Anggota</label>
						    <input type="text" name="id_anggota" class="form-control" id="id_anggota">
						</div>
						<div class="form-group">
						    <label for="nama">Nama Anggota</label>
						    <input type="text" name="nama" class="form-control" id="nama">
						</div>

							<h3>Data Peminjaman</h3>

						<div class="form-group">
						    <label for="no_pinjam">Nomor Peminjaman</label>
						    <input type="text" name="no_pinjam" class="form-control" id="no_pinjam">
						</div>
						<div class="form-group">
						    <label for="tanggal_pinjam">Tanggal Peminjaman</label>
						    {{-- <input type="text" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam"> --}}
						    <input type="text" class="datepicker-here form-control" data-language='en' name="tanggal_pinjam" id="tanggal_pinjam" autocomplete="off" data-position='top left'/>
						</div>

						<div class="form-group">
						    <label for="lama_pinjam">Lama Peminjaman</label>
						    <input type="text" name="lama_pinjam" class="form-control" id="lama_pinjam">
						  </div>
						<div class="form-group">
						    <label for="tanggal_kembali">Tanggal Kembali</label>
						    {{-- <input type="text" name="tanggal_kembali" class="form-control" id="tanggal_kembali"> --}}
						    <input type="text" class="datepicker-here form-control" data-language='en' name="tanggal_kembali" id="tanggal_kembali" autocomplete="off" data-position='top left'/>
						    <input type="text" name="tanggal_kembali" class="form-control" id="tanggal_kembali">
						</div>
	            </div>
	        </div>	
		</div>

		<div class="col-md-6">
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Stok Buku Di Perpustakaan</h3>
	            </div>

	            <!-- /.box-header -->
	            <div class="box-body" >
	            	<!-- table stok Buku -->
	            	{{-- Table Stok Buku --}}
	            	<table class="table" id="tabel">
	            		<thead>
	            			<tr>
	            				<th>No</th>
	            				<th>Kode Buku</th>
	            				<th>Judul</th>
	            				<th>Stock</th>
	            			</tr>
	            		</thead>
	            		<tbody>

	            			@php
	            				$no = 1
	            			@endphp
	            			@foreach ($buku as $item)
	            			
	            			<tr>
	            				<td>{{ $no }}</td>
	            				<td>{{ $item->kode_buku }}</td>
	            				<td>{{ $item->judul }}</td>
	            				<td>{{ $item->jumlah }}</td>
	            			</tr>
		            			@php
		            				$no++
		            			@endphp

	            			@endforeach
	            		</tbody>
	            	</table>
	            </div>
	            <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">Pilih Buku</h3>
		            </div>

		            <!-- /.box-header -->
		            <div class="box-body">
		            	<div class="form-group">
						    <label for="kategori">Kategori</label>
						    <select name="kategori[]" class="form-control dinamis" id="kategori" data-dependent="kode_buku">
						    	@foreach ($buku as $item)
						    		<option value="{{$item->kategori}}">{{$item->kategori}}</option>
						    	@endforeach
						    </select>
						</div>
						<div class="form-group">
						    <label for="kode_buku">Kode Buku</label>
						    <select name="kode_buku[]" class="form-control dinamis" id="kode_buku" data-dependent="judul">
						    	<option value="">Pilih Kode Buku</option>
						    </select>
						</div>
						<!-- <div class="form-group">
						    <label for="judul">Judul</label>
						    <select name="judul[]" class="form-control dinamis" id="judul" data-dependent="kode_buku">
						    	<option value="">Pilih Judul Buku</option>
						    </select>
						</div> -->
						<div class="form-group">
						    <label for="id_pegawai">Pegawai</label>
						    <input type="text" name="id_pegawai" class="form-control" id="id_pegawai">
						</div>
						<div class="form-group">
							<button class="btn btn-block button-success">Pinjam</button>
						</div>
		            </div>
		            	{{ csrf_field() }}
		          	
		        </div>
	        </div>
		</div>
	  </form>
	</div>
</div>

	<script>
		$(document).ready(function () {
			$('#tabel').DataTable()
			$('.dinamis').change(function () {
				if ($(this).val() != ''){
					var pilih = $(this).attr('id')
					var nilai = $(this).val()
					var depend = $(this).data('dependent')
					var token = $("input[name = '_token']").val();
					$.ajax({
						url : "{{route ('jabar')}}",
						method : 'POST',
						data : { pilih: pilih, nilai: nilai, depend: depend, _token: token},
						success: function (res) {
							$('#'+depend).html(res)
						}
					})
				}
			})
		})
	</script>
	<!-- <script>
		$(document).ready(function () {
			$('#tabel').DataTable();
			$('#kategori').multiselect({
				nonSelectedText: 'Pilih Kategori',
				buttonWidth: '100%',

				onChange: function (option, selected){
					var kategori = this.$select.val();
					var token = $("input[name='_token']").val();
					if (kategori.length > 0) {
						$.ajax({
							url : "{{ route('jabar') }}",
							method : 'POST',
							data : {kategori:kategori, _token:token},
							success: function (data) {
								$('#kode_buku').html(data)
								$('#kode_buku').multiselect('rebuild')
							}
						})
					}
				}
			});
			$('#kode_buku').multiselect({
				nonSelectedText: 'Pilih Kategori',
				buttonWidth: '100%'
			})
		})
	</script> -->

@endsection
<!-- <script>
		$(document).ready(function () {
			$('#tabel').DataTable()
			$('.dinamis').change(function () {
				if ($(this).val() != ''){
					var pilih = $(this).attr('id')
					var nilai = $(this).val()
					var depend = $(this).data('dependent')
					var token = $("input[name = '_token']").val();
					$.ajax({
						url : "{{route ('jabar')}}",
						method : 'POST',
						data : { pilih: pilih, nilai: nilai, depend: depend, _token: token},
						success: function (res) {
							$('#'+depend).html(res)
						}
					})
				}
			})
		})
	</script> -->


	