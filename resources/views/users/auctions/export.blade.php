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
		<h5>Laporan Lelang</h5>
	</center>

    <br>

	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th style="text-align:center">No</th>
                <th>Pengguna</th>
				<th>Nama Barang</th>
				<th>Harga Akhir</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Berakhir</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($auctions as $auction)
			<tr>
				<td style="text-align:center">{{ $loop->iteration }}</td>
				<td>{{ $auction->user->name }}</td>
				<td>{{ $auction->goods->goods }}</td>
				<td>Rp. {{ $auction->final_price }}</td>
				<td>{{ $auction->start_date }}</td>
				<td>{{ $auction->end_date }}</td>
				<td>{{ auction_status($auction->status) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
