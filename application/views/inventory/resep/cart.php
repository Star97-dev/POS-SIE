<?php 
	$no = 1;
	if ($cart->num_rows() > 0) {
		foreach ($cart->result() as $c => $data) { ?>
			<tr>
				<td><?=$no++?></td>
				<td id="id_bahan"><?=$data->nama_bahan?></td>
				<td id="qty"><?=$data->qty?></td>
				<td id="satuan"><?=$data->satuan?></td>
				<td><button id="del_cart" 
					data-id_cart="<?=$data->id_cart?>"
					data-id_bahan="<?=$data->id_bahan?>" 
					data-qty="<?=$data->qty?>"
					class="btn btn-xs btn-danger">
				 	<i class="fa fa-trash"></i> Delete 
					</button></td>
			</tr>
		<?php }	
	}
	else{
		echo '<tr>
		<td colspan="8" class="text-center"> -Tidak ada bahan resep-</td>
		</tr>';
	}
?>