@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		
		<div class="col-md-11">
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Pengembalian</h3>
	            </div>

	            <!-- /.box-header -->
	            <div class="box-body">
	            	<form action="{{ route('kembali.store') }}" method="POST">
			  			
			  			{{ csrf_field() }}

			  			<div class="form-group">
						    <label for="id_anggota">Nomer Pinjam</label>
						    	<select name="no_pinjam" id="no_pinjam" class="form-control">
						    		<option value="">Pilih Nomer Pinjam</option>
						    		@foreach($data as $item)
						    			<option value="{{ $item->id }}">{{ $item->no_pinjam }}</option>
						    		@endforeach
						    	</select>
						</div>
						<div class="form-group">
						    <label for="id_anggota">ID Anggota</label>
						    <input type="text" name="id_anggota" class="form-control" id="id_anggota">
						</div>
						<div class="form-group">
						    <label for="id_buku">Buku</label>
						    <input type="text" name="id_buku" class="form-control" id="id_buku">
						</div>
						<div class="form-group">
						    <label for="tanggal_pinjam">Tanggal Pinjam</label>
						    <input type="text" class="datepicker-here form-control" data-language='en' name="tanggal_pinjam" id="tanggal_pinjam" autocomplete="off" data-position='top left'/>
						</div>
						<div class="form-group">
						    <label for="tanggal_kembali">Tanggal Kembali</label>
						    <input type="text" class="datepicker-here form-control" data-language='en' name="tanggal_kembali" id="tanggal_kembali" autocomplete="off" data-position='top left'/>
						</div>
						<div class="form-group">
						    <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
						    <input type="text" class="datepicker-here form-control" data-language='en' name="tanggal_pengembalian" id="tanggal_pengembalian" autocomplete="off" data-position='top left'/>
						</div>

						<!-- Tambahan Keterlambatan -->
						<div class="form-group">
							<label for="Kode Buku">Keterlambatan / Hari</label>
							<input type="text" name="terlambat" id="terlambat" class="form-control" autocomplete="off">
						</div>

						{{-- // buku --}}
						<div class="box-body">
							<div class="form-group">
								<label for="kategori">Kategori</label>
								<select name="kategori[]" class="form-control" id="kategori" multiple="multiple">
									@foreach ($buku as $item)
										<option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
									@endforeach
								</select>
							</div>
							<div>
								<label for="kode_buku">Kode Buku</label>
								<select name="kode_buku[]" class="form-control" id="kode_buku" multiple="multiple">
									<option value="">Pilih Kode Buku</option>
								</select>
							</div>
						</div>
							{{-- akhir buku --}}
						<div class="form-group">
						    <label for="admin">Admin</label>
						    <input type="text" name="admin" class="form-control" id="admin">
						</div>
						<div class="form-group">
						    <label for="status">Status Pengembalian</label>
						    <select name="status" class="form-control" id="status">
						    	<option value="">Pilih Status</option>
						    	<option value="Clear">Clear</option>
						    	<option value="Kurang">Kurang</option>
						    	<option value="Terlambat">Terlambat</option>
						    </select>
						</div>
						<div class="form-group">
						    <label for="kekurangan">Buku Yang Belum Dikembalikan</label>
						    <input type="text" name="kekurangan" class="form-control" id="kekurangan" placeholder="Jika Ada">
						</div>
						<div class="form-group">
						    <label for="keterangan">Keterangan</label>
						    <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="3"></textarea>
						</div>
						<button type="submit" class="btn-sm btn-succcess">Simpan</button>
					</form>
	            </div>
	        </div>	
		</div>

	</div>
</div>

	<script>
		$(document).ready(function() {
			$('#kategori').multiselect({
				nonSelectedText: 'Pilih Kategori',
				buttonWidth: '100%',

				onChange: function (option, selected){
					var kategori = $(this).$select.val()
					var token = $("input[name='_token']").val()
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
			});
			function selisih(){
				var tgglSekarang = new Date
				var a = Date.parse($('#tanggal_pinjam').val())
				var b = Date.parse(tgglSekarang)
				var perbedaan = 0
				var slsh = ''
				if (b) {
					perbedaan = (b-a)/1000
					slsh = (Math.floor(perbedaan/86400)); //24*60*6-
					console.log(slsh);
				}
				if (parseInt(slsh) > 3) {
					$('#tanggal_kembali').css("background","red")
					//tambahan keterlambatan
					$('#terlambat').val(slsh)
					
				} else {
					$('#tanggal_kembali').css("background","lightgreen")
				}
			}
			$('#no_pinjam').change(function(){
				var kode = $('#no_pinjam').val()
				var token = $("input[name='_token']").val();
				$.ajax({
					url : "{{ route('cari') }}",
					method: 'POST',
					data: {id: kode, _token:token},
					success: function(res){
						console.log(res.data);
						$('#id_anggota').val(res.data.nama)
						$('#tanggal_pinjam').val(res.data.tanggal_pinjam)
						$('#tanggal_kembali').val(res.data.tanggal_kembali)
						$('#id_buku').val(res.data.id_buku)
						selisih ()
					}
				})
			});
		});
	</script>

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


	