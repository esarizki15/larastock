<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SURAT JALAN BARANG</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<center>
		<h1>SURAT JALAN BARANG</h1>
		<hr style="border: 1px solid">
	</center>
	
	<table width="100%" >
		<tbody>
			<tr>
				@foreach ($transaksi as $log)		{{-- expr --}}
				@endforeach
				<td width="100%" colspan="2"><div style="float: right;">No : {{ $log->suratJalan->no_surat }}</div></td>
			</tr>
			<tr>
				<td width="50%" style="font-weight: bold;">Surat Jalan Barang V.3.0</td>
				<td width="50%"><div style="float: right; font-style: italic;">(Diisi oleh Warehouse Staff)</div></td>
			</tr>
		</tbody>
	</table>
        <table width="100%" style="font-weight: bold;">
        	<tbody>
        		<tr>
        			<td width="10%">Tujuan</td>
        			<td width="40%">: {{ $log->gedung->nama }}</td>
        			<td width="50%"></td>
        		</tr>
        		<tr>
        			<td>Alamat</td>
        			<td>: {{ $log->gedung->alamat }}</td>
        		</tr>
        	</tbody>
        </table>
        <table width="100%" style="font-weight: bold;">
			<tbody>
				<tr>
					<td width="60%"></td>
					<td>NP (Nomor Proses) :</td>
				</tr>
			</tbody>	
		</table>
        <table width="100%" style="font-weight: bold;">
            <tbody>
                <tr>
					<td width="10%">UP</td>
					<td width="40%">:</td>
					<td width="10%">Pengirim </td>
					<td width="40%">: {{ $log->suratJalan->pengirim }}</td>
                </tr>
				<tr>
					<td>No. Telepon</td>
					<td>:</td>
					<td>No. Telp</td>
					<td>: {{ $log->suratJalan->hp }}</td>
                </tr>
				<tr>
					<td>Tanggal</td>
					<td>: {{ $log->suratJalan->created_at }}</td>
					<td>Nopol</td>
					<td>: {{ $log->suratJalan->no_polisi }}</td>
                </tr>
            </tbody>
        </table>
		<table width="100%" border="1" cellspacing="0">
			<tbody>
                <tr style="align-content: center; font-weight: bold; align-items: center; text-align: center">
					<td rowspan="2">No.</td>
					<td rowspan="2">P</td>
					<td rowspan="2">CS</td>
					<td rowspan="2">Deskripsi</td>
					<td colspan="2">Jumlah Barang</td>
					<td rowspan="2">Hrg. Tiket/Keterangan</td>
					<td rowspan="2">NM</td>
					<td rowspan="2">NP</td>
                </tr>
				<tr style="text-align: center; font-weight: bold;">
					<td>Qty</td>
					<td>Satuan</td>
				</tr>
@php
	$c = 1;
@endphp
					@foreach ($log->carts as $l)
				<tr>
						<td style="text-align: center;">{{ $c++ }}</td>
						<td></td>
						<td></td>
						<td>{{ $l->barang->nama }}</td>
						<td style="text-align: center;">{{ $l->qty }}</td>
						<td style="text-align: center;">{{ $l->barang->satuan->nama }}</td>
						<td style="text-align: center;">{{ $log->gedung->area->barangs->find($l->barang_id)->pivot->harga }} / {{ $l->keterangan }}</td>
						<td></td>
						<td></td>
				</tr>
					@endforeach
            </tbody>
		</table>
		<br>
	<table width="100%" style="text-align: center;">
		<tbody>
			<tr>
				<td width="25%">Dibuat Oleh</td>
				<td width="25%">Mengetahui</td>
				<td width="25%">Diantar Oleh</td>
				<td width="25%">Diterima Oleh</td>
			</tr>
			<tr>
				<td><pre>
				
				</pre></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			
			<tr>
				<td>(Warehouse Staff)</td>
				<td><pre>(               )</pre></td>
				<td><pre>(               )</pre></td>
				<td><pre>(               )</pre></td>
			</tr>
		</tbody>
	</table>
	<p style="font-size: 12px; font-weight: bold;">Keterangan :</p>
	<table width="100%" style="text-align: center; font-weight: bold; font-size: 12px">
		<tbody>
			<tr>
				<td width="25%">P : Cek Pengirim</td>
				<td width="25%">CS : Cek Staff Counter</td>
				<td width="25%">NM : Nomor Muatan</td>
				<td width="25%">NP : Nomor Proses</td>
			</tr>
		</tbody>
	</table>
	<br>
	<div style="width: 100%; text-align: center; font-weight: bold; border: 3px solid #000000;">
		NB:HARAP SPAREPART RUSAK DIKEMBALIKAN KE KANTOR PUSAT (HO) <br>
		NAMA BARANG & TIKET HARUS DISESUAIKAN DISURAT JALAN YA
	</div>
</body>
</html>