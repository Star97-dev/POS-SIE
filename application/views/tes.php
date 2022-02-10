<head>
	<h1> Ngetes disini</h1>
</head>
<body>
	<!-- <table>
		<thead>
			<tr>
				<th> No .</th>
				<th> Id Penjualan </th>
				<th> Tanggal Penjualan </th>
				<th> Total Penjualan </th>
				<th> Id Stok </th>
				<th> Tanggal Stok </th>
				<th> Total Stok </th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($drilldown as $dd => $data) : ?>
				<tr>
					<td> <?=$no++?> </td>
					<td><?=$data->id_penjualan?></td>
					<td><?=$data->tanggal_penjualan?></td>
					<td><?=$data->total_penjualan?></td>
					<td><?=$data->id_stok?></td>
					<td><?=$data->tanggal_stok?></td>
					<td><?=$data->total_stok?></td>
					
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table> -->
<hr>
			<a href="<?=site_url('Tes/tampil_bahan')?>" >
				<i class="fa fa-plus"></i>Tampil Bahan
			</a>
</body>

