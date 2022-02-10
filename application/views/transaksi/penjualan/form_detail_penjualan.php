<section class="content-header">
	<h1> Penjualan
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-barcode"></i></a></li>
		<li class="active"> Transaksi </li>
		<li class="active"> Penjualan </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Detail Penjualan </h3>
				<div class="pull-right">
					<button id="back_detail" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">
					<form action="" method="post">
						<div class="row">
							<div class="form-group col-md-6 col-md-offset-1">
								<?php foreach ($penjualan as $pnj) : ?>
									<input id="id_penjualan" type="hidden" name="id_penjualan" value="<?=$this->input->post('id_penjualan') ?: $pnj->id_penjualan ?>" class="form-control">
									<input id="sub_total" type="hidden" name="sub_total" value="<?=$this->input->post('sub_total') ?: $pnj->sub_total ?>" class="form-control">
									<input id="diskon" type="hidden" name="diskon" value="<?=$this->input->post('diskon') ?: $pnj->diskon ?>" class="form-control">
									<input id="grand_total" type="hidden" name="grand_total" value="<?=$this->input->post('total') ?: $pnj->total ?>" class="form-control">
									<input id="cash" type="hidden" name="cash" value="<?=$this->input->post('cash') ?: $pnj->cash ?>" class="form-control">
									<input id="change" type="hidden" name="change" value="<?=$this->input->post('change') ?: $pnj->change ?>" class="form-control">
                                    
									<label><h4><b> Kasir : </b></h4></label>
                                    <input type="text" name="nama_user" value="<?= $pnj->nama_user ?>" class="form-control" readonly>

								    <label><h4><b> Invoice : </b></h4></label>
									<input type="text" name="invoice" value="<?= $pnj->invoice ?>" class="form-control" readonly>
									
								<?php endforeach; ?>
									<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8 col-md-offset-0">
								<table class="table table-bordered table-striped" id="table0">
									<thead>
										<tr>
											<th> Nama Menu </th>
											<th> Harga </th>
											<th> Qty </th>
                                            <th> Total </th>
											<?php if($this->fungsi->user_login()->level == 3 ) { ?>
											<th> Action </th>
											<?php } ?>
										</tr>
									</thead>
									<tbody id="tabel_detail">
										<?php foreach ($detail_penjualan as $dp) : ?>
											<tr>
												<td><?= $dp->nama_menu ?></td>
												<td><?=indo_currency($dp->harga_detail) ?></td>
												<td><?= $dp->qty ?></td>
                                                <td id="total_tabel"><?=$dp->total?></td>
												<?php if($this->fungsi->user_login()->level == 3 ) { ?> 
												<td class="text-center" width="150px">
													<a class="btn btn-xs btn-primary" id="update_detail" data-toggle="modal" data-target="#modal-update" 
													data-id_penjualan ="<?=$pnj->id_penjualan?>"
													data-sub_total ="<?=$pnj->sub_total?>"
													data-diskon ="<?=$pnj->diskon?>"
													data-grand_total ="<?=$pnj->total?>"
													data-cash ="<?=$pnj->cash?>"
													data-change ="<?=$pnj->change?>"

													data-id_detail_penjualan = "<?=$dp->id_detail_penjualan?>"
													data-id_menu_detail = "<?=$dp->id_menu_detail?>"
													data-nama_menu = "<?=$dp->nama_menu?>"
													data-harga_detail = "<?=$dp->harga_detail?>"
													data-qty = "<?=$dp->qty?>"
													data-total = "<?=$dp->total?>"
													>
													
														<i class="fa fa-pencil"></i> Update
													</a>
													<a id="del_detail" class="btn btn-danger btn-xs" data-id_detail_penjualan="<?=$dp->id_detail_penjualan?>">
														<i class="fa fa-trash"></i> Delete
													</a>
												</td>
													<?php } ?>
											</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal Form edit detail penjualan -->
<div class="modal fade" id="modal-update">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"> Update Detail Penjualan </h4>
			</div>
			<div class="modal-body">
				
				<label> Nama menu : </label>
				<div class="form-group input-group">
				<input type="hidden" id="id_detail_penjualan">
				<input type="hidden" id="id_penjualan">
				<input type="hidden" id="sub_total">
				<input type="hidden" id="diskon">
				<input type="hidden" id="grand_total">
				<input type="hidden" id="cash">
				<input type="hidden" id="change">
				<input type="hidden" id="id_menu">
					<input type="text" id="nama_menu" class="form-control" readonly required>
					<span class="input-group-btn">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-menu">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
				<div class="form-group">
					<label for="harga_detail"> Harga : </label>
					<input type="text" id="harga_detail" value="" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="qty"> Qty : </label>
					<input type="number" id="qty" class="form-control">
				</div>
				<div class="form-group">
					<label for="total"> Total : </label>
					<input type="text" id="total" value="" class="form-control" readonly>
				</div>
				<div class="modal-footer">
					<div class="pull-right">
					   <button type="button" id="edit_detail" class="btn btn-success">
					      <i class="fa fa-paper-plane"></i> Save
					   </button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal select menu -->
<div class="modal fade" id="modal-menu">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-tittle"> Pilih Menu </h3>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th> Nama </th>
							<th> Harga </th>
							<th width="100px"> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($menu as $mn => $data) { ?>
						<tr>
							<td><?=$data->nama?></td>
							<td><?=$data->harga?></td>
							<td>
								<button type="button" class="btn btn-info btn-xs" id="select"
									data-id_menu="<?=$data->id_menu?>"
									data-nama="<?=$data->nama?>"
									data-harga="<?=$data->harga?>"
									> 
									<i class="fa fa-check"> Select </i> 
								</button>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
	$(document).on('click','#update_detail', function(){
		var id_detail_penjualan = $(this).data('id_detail_penjualan')
		var id_penjualan = $(this).data('id_penjualan')
		var sub_total = $(this).data('sub_total')
		var diskon = $(this).data('diskon')
		var grand_total = $(this).data('grand_total')
		var cash = $(this).data('cash')
		var change = $(this).data('change')
		var id_menu = $(this).data('id_menu_detail')
		var nama_menu = $(this).data('nama_menu')
		var qty = $(this).data('qty')
		var harga_detail = $(this).data('harga_detail')
		var diskon_menu = $(this).data('diskon_menu')
		var total = $(this).data('total')

		$('#id_detail_penjualan').val(id_detail_penjualan)
		$('#id_penjualan').val(id_penjualan)
		$('#sub_total').val(sub_total)
		$('#diskon').val(diskon)
		$('#grand_total').val(grand_total)
		$('#cash').val(cash)
		$('#change').val(change)
		$('#id_menu').val(id_menu)
		$('#nama_menu').val(nama_menu)
		$('#qty').val(qty)
		$('#harga_detail').val(harga_detail)
		$('#diskon_menu').val(diskon_menu)
		$('#total').val(total)
	})

	$(document).on('click','#select', function(){
		var id_menu = $(this).data('id_menu')
		var nama = $(this).data('nama')
		var harga = $(this).data('harga')

		$('#id_menu').val(id_menu)
		$('#nama_menu').val(nama)
		$('#harga_detail').val(harga)
		$('#modal-menu').modal('hide')

		hitung_edit_penjualan()
	})

	function hitung_edit_penjualan(){
		var harga = $('#harga_detail').val()
		var qty = $('#qty').val()
		var diskon_menu = $('#diskon_menu').val()

		total = (harga - diskon_menu) * qty
		$('#total').val(total)

		if(qty < 0 || qty == ''){
			alert('Qty minimal 1')
			$('#qty').val(1)
			$('#qty').focus()
		}
		else if (diskon_menu< 0 || diskon_menu== '') {
			$('#diskon_menu').val(0)
		} 
	}
	 
	$(document).on('keyup mouseup', '#harga_detail, #qty, #diskon_menu', function(){
		hitung_edit_penjualan()
	})

	//save edit detail
	$(document).on('click','#edit_detail', function(){
		var id_detail_penjualan = $('#id_detail_penjualan').val()
		var id_menu = $('#id_menu').val()
		var harga = $('#harga_detail').val()
		var diskon_menu = $('#diskon_menu').val()
		var qty = $('#qty').val()
		var total = $('#total').val()

	$.ajax({
		type : 'POST',
		url : '<?=site_url('penjualan/proses')?>',
		data : {'edit_detail' : true, 'id_detail_penjualan' : id_detail_penjualan, 'id_menu' : id_menu, 'qty' : qty, 'harga' : harga, 'diskon_menu' : diskon_menu, 
			'total' : total},
		dataType : 'json',
		success : function(result){
			if (result.success == true) {
				alert('Data berhasil di update!')
			} else {
				alert('Gagal update data!')
			}
			location.href='<?=site_url('penjualan/detail/'.$pnj->id_penjualan)?>'
		}
	})
	})

	//delete detail
	$(document).on('click','#del_detail',function(){
		if (confirm('Yakin menghapus data?')) {
			var id_detail_penjualan = $(this).data('id_detail_penjualan')
		}
		
			$.ajax({
				type : 'POST',
				url : '<?=site_url('penjualan/proses')?>',
				data : {'del_detail' : true, 'id_detail_penjualan' : id_detail_penjualan},
				dataType : 'json',
				success : function(result){
					if(result.success == true){
						location.href='<?=site_url('penjualan/detail/'.$pnj->id_penjualan)?>'
					}
				}
			})
		
	})

	//kalkulasi subtotal
	function kalkulasi(){
		var subtotal = 0
		var diskon = $('#diskon').val()
		var grand_total = $('#grand_total').val()
		var cash = $('#cash').val()
		var change = $('#change').val()

		$('#tabel_detail tr').each(function(){
			subtotal += parseInt($(this).find('#total_tabel').text())
		})
		$('#sub_total').val(subtotal)

		grand_total = subtotal - diskon
		$('#grand_total').val(grand_total)

		change = cash - grand_total
		$('#change').val(change)
	}
	
	$(document).ready(function(){
		kalkulasi()
	})

	$(document).on('click','#back_detail', function(){
		var id_penjualan = $('#id_penjualan').val()
		var sub_total = $('#sub_total').val()
		var diskon = $('#diskon').val()
		var grand_total = $('#grand_total').val()
		var cash = $('#cash').val()
		var change = $('#change').val()

		$.ajax({
			type : 'POST',
			url : '<?=site_url('penjualan/proses')?>',
			data : {'back_detail' : true, 'id_penjualan' : id_penjualan, 'sub_total' : sub_total, 'diskon' : diskon, 'grand_total' : grand_total, 'cash' : cash, 'change' : change},
			datType : 'json',
			success : function(result){
				location.href='<?=site_url('penjualan')?>'
			}
		})
	})
</script>