<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>ID Pembayaran</th>
				<th>ID Petugas</th>
				<th>NISN</th>
				<th>Tanggal Bayar</th>
				<th>Bulan Bayar</th>
				<th>Tahun Bayar</th>
				<th>ID SPP</th>
				<th>Jumlah Bayar</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($history as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->id_pembayaran}}</td>
				<td>{{$p->id_petugas}}</td>
				<td>{{$p->nisn}}</td>
				<td>{{$p->tgl_bayar}}</td>
				<td>{{$p->bulan_bayar}}</td>
				<td>{{$p->tahun_bayar}}</td>
				<td>{{$p->id_spp}}</td>
				<td>{{$p->jumlah_bayar}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>