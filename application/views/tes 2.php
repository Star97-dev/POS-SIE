	<table>
		<thead>
			<tr>
				<th> No. </th>
				<th> Nama </th>
				<th> Harga </th>
				<th> Stok </th>
				<th> Satuan </th>
				<th> result </th>
				<th> nilai akhir</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1;
			 foreach ($bahan as $b => $data) { ?>
				<tr>
					<td><?=$no++?></td>
					<td><?=$data->nama?></td>
					<td><?=$data->harga?></td>
					<td><?=$data->stok?></td>
					<td><?=$data->satuan?></td>
					<td><?=$data->result?></td>
					<td><?=$data->na?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>