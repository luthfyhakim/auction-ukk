<!DOCTYPE html>
<html>
	<head>
        {{-- Required meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<style type="text/css">
			table tr td,
			table tr th{
				font-size: 9pt;
			}
		</style>
	</head>
	<body>
	<center>
		{{-- <img src="{{ asset('img/favicon.png') }}" width="50" alt="logo"> --}}
		<h5>Laporan Barang</h5>
	</center>

	<br>

	<table class="table table-bordered table-striped mt-5">
		<thead>
			<tr>
				<th style="text-align:center">No</th>
				<th>Barang</th>
				<th>Deskripsi</th>
				<th>Dibuat</th>
				<th>Harga Awal</th>
			</tr>
		</thead>
		<tbody>
			@foreach($goodies as $goods)
			<tr>
				<td style="text-align:center">{{ $loop->iteration }}</td>
				<td>{{ $goods->goods }}</td>
				<td>{{ $goods->description }}</td>
				<td>{{ $goods->created_at }}</td>
				<td>Rp. {{ $goods->initial_price }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
