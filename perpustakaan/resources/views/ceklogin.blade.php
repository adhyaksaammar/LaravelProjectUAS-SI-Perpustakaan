@if (Auth::guard('admin')->check())
	<p class="text label-info">
		<h3>Anda Sedang Login Sebagai Admin</h3>
	</p>
@endif