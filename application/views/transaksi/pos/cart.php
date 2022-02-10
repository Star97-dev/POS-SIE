<?php 
	$no = 1;
	if ($cart->num_rows() > 0) {
		foreach ($cart->result() as $c => $data) { ?>
			<tr>
				<td><?=$no++?></td>
				<td><?=$data->nama_menu?></td>
				<td><?=indo_currency($data->harga_menu)?></td>
				<td><?=$data->qty?></td>
				<td id="total"><?=$data->total?></td>
				<td class="text-center" width="160px">
					<button id="update_cart" data-toggle="modal" data-target="#modalupdate"
						data-id_cart="<?=$data->id_cart?>"
						data-id_menu="<?=$data->nama_menu?>"
						data-harga="<?=$data->harga_menu?>"
						data-qty="<?=$data->qty?>"
						data-total="<?=$data->total?>"
						class="btn btn-xs btn-primary">
							<i class="fa fa-pencil"></i> Update
						</button>
				
				<button id="del_cart" data-id_cart="<?=$data->id_cart?>" class="btn btn-xs btn-danger"> 
						<i class="fa fa-trash"></i> Delete
					</button>
				</td>
			</tr>
		<?php }	
	}
	else{
		echo '<tr>
		<td colspan="9" class="text-center"> - Belum ada order - </td>
		</tr>';
	}
?>