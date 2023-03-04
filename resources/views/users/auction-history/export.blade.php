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
		<h5>Laporan History Lelang</h5>
	</center>

    <br>

	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th style="text-align:center">No</th>
                <th>Pengguna</th>
				<th>Nama Barang</th>
				<th>Harga Awal</th>
                <th>Penawaran Saya</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Berakhir</th>
			</tr>
		</thead>
		<tbody>
			@foreach($auction_histories as $auction_history)
			<tr>
				<td style="text-align:center">{{ $loop->iteration }}</td>
				<td>{{ $auction_history->user->name }}</td>
				<td>{{ $auction_history->goods->goods }}</td>
				<td>Rp. {{ $auction_history->goods->initial_price }}</td>
				<td>Rp. {{ $auction_history->bid }}</td>
				<td>{{ custom_date($auction_history->auction->start_date, 'd M Y') }}</td>
				<td>{{ custom_date($auction_history->auction->end_date, 'd M Y') }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
