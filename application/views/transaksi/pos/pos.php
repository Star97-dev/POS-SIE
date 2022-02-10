<section class="content-header">
	<h1> POS
		<small> Page Views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="pos"><i class="fa fa-barcode"></i></a></li>
        <li class="active">Transaksi</li>
        <li class="active">POS</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-4">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align:top">
								<label for="tanggal"> Tanggal </label>
							</td>
							<td>
								<div class="form-group">
									<input type="date" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<label> Kasir </label>
							</td>
							<td>
								<div class="form-group">
									<input type="text" id="id_user" value="<?=$this->fungsi->user_login()->nama?>" class="form-control" readonly>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box box-widget">
				<div class="box-body">
					<table width="100%">
						<tr>
							<td style="vertical-align:top; width:20%">
								<label for="menu"> Menu </label>
							</td>
							<td>
								<div class="form-group input-group">
									<input type="hidden" id="id_menu">
									<input type="hidden" id="harga">
									<input type="text" id="nama" class="form-control" autofocus>
									<span class="input-group-btn">
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-menu">
											<i class="fa fa-search"></i> 
										</button>
									</span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<label> Qty </label>
							</td>
							<td>
								<div class="form-group">
									<input type="number" id="qty" value="1" min="1" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<div>
									<button type="button" id="add_cart" class="btn btn-primary">
										<i class="fa fa-cart-plus"></i> Add
									</button>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box box-widget">
				<div class="box-body">
					<div align="right">
						<h4> Invoice <b><span id="invoice"><?=$invoice?></span></b></h4>
						<h1><b><span id="grand_total2" style="font-size: 50pt">0</span></b></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="box box-widget">
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<th> No </th>
								<th> Nama Menu </th>
								<th> Harga </th>
								<th> Qty </th>
								<th width="15%"> total </th>
								<th> Actions </th>
							</thead>
							<tbody id="cart_table">
								<?php $this->view('transaksi/pos/cart')?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align:top; width:30%">
									<label for="sub_total"> Sub Total </label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="sub_total" value="" class="form-control" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top">
									<label for="diskon"> Diskon </label>
								</td>
								<td>
									<div class="form-group">
										<?php foreach($diskon as $ds) : ?>
											<input type="number" id="diskon" value="<?=$ds->hargaDiskon?>" class="form-control" readonly>
										<?php endforeach; ?>
									</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align:top">
									<label for="grand_total"> Grand Total </label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="grand_total" value="" class="form-control" readonly>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align:top; width:30%">
									<label for="cash"> Cash </label>
								</td>
								<td>
								<div class="form-group">
									<input type="number" id="cash" value="0" min="0" class="form-control">
								</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top">
									<label for="change"> Change </label>
								</td>
								<td>
									<div class="form-group">
										<input type="number" id="change" class="form-control" readonly>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="box box-widget">
					<div class="box-body">
						<table width="100%">
							<tr>
								<td style="vertical-align:top">
									<label for="note"> Note </label>
								</td>
								<td>
								<div>
									<textarea id="note" rows="4" class="form-control"></textarea>
								</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div>
					<button id="cancel" class="btn btn-warning">
						<i class="fa fa-refresh"></i> Cancel
					</button>
					<br>
					<br>
					<button id="payment" class="btn btn-lg btn-success">
						<i class="fa fa-paper-plane-o"></i> Payment
					</button>
				</div>
			</div>
		</div>
</section>
<!-- Modal add -->
<div class="modal fade" id="modal-menu">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title"> Pilih Menu </h3>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th> Nama </th>
							<th> Jenis </th>
							<th> Harga </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($menu as $mn => $data){?>
						<tr>
							<td><?=$data->nama?></td>
							<td><?=$data->jenis?></td>
							<td><?=indo_currency($data->harga)?></td>
							<td>
								<button class="btn btn-xs btn-info" id="select"
									data-id="<?=$data->id_menu?>"
									data-nama="<?=$data->nama?>"
									data-jenis="<?=$data->jenis?>"
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

<!-- Modal Edit -->
<div class="modal fade" id="modalupdate">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"> Update Pesanan </h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="idcart_menu">
				<div class="form-group">
					<label for="nama_menu"> Nama Menu </label>
					<input type="text" id="nama_menu" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="harga_menu"> Harga </label>
					<input type="number" id="harga_menu" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="qty_menu"> Qty </label>
					<input type="number" id="qty_menu" min="1" class="form-control">
				</div>
				<div class="form-group">
					<label for="total_sd"> Total </label>
					<input type="number" id="total_sd" class="form-control" readonly>
				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-right">
					<button type="button" id="edit_cart" class="btn btn-success"> 
					<i class="fa fa-paper-plane"></i> Save
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
	$(document).on('click','#select', function(){
		$('#id_menu').val($(this).data('id'))
		$('#nama').val($(this).data('nama'))
		$('#jenis').val($(this).data('jenis'))
		$('#harga').val($(this).data('harga'))
		$('#modal-menu').modal('hide')
	})

	//add data cart
	$(document).on('click', '#add_cart', function(){
		var id_menu = $('#id_menu').val()
		var nama = $('#nama').val()
		var harga = $('#harga').val()
		var qty = $('#qty').val()

	if (id_menu =='') {
		alert('Menu belum dipilih!')
		$('#nama').focus()
	} else if(qty == ''){
		alert('Qty minimal 1!')
		$('#qty').val(1)
		$('#qty').focus()
	}
	else{
		$.ajax({
			type: 'POST',
			url: '<?=site_url('pos/proses')?>',
			data: {'add_cart' : true, 'id_menu' : id_menu, 'nama' : nama, 'harga' : harga, 'qty' : qty},
			success: function(result) {
				let res = JSON.parse(result)
				if (res.success == true) {
					$('#cart_table').load('<?= site_url('pos/cart_data') ?>', function() {
						kalkulasi()
					})
					$('#id_menu').val('')
					$('#nama').val('')
					$('#qty').val(1)
					$('#nama').focus()
				} else {
					alert('gagal input cart!')
				}
			}
		})
	}
})

	//delete data cart
	$(document).on('click', '#del_cart', function(){
		if(confirm('Yakin untuk menghapus?')){
			var id_cart = $(this).data('id_cart')
			$.ajax({
				type: 'POST',
				url: '<?=site_url('pos/cart_del')?>',
				dataType: 'json',
				data: {'id_cart': id_cart},
				success: function(result){
					if(result.success == true){
						$('#cart_table').load('<?=site_url('pos/cart_data')?>', function(){
							kalkulasi()
						})
					}else{
						alert('Gagal menghapus!')
					}
				}
				})
		}
	})

	//update data cart
	$(document).on('click','#update_cart', function(){
		$('#idcart_menu').val($(this).data('id_cart'))
		$('#nama_menu').val($(this).data('id_menu'))
		$('#harga_menu').val($(this).data('harga'))
		$('#qty_menu').val($(this).data('qty'))
		$('#total_sd').val($(this).data('total'))
	})

	//kalkulasi di modal edit
	function hitung_edit_modal(){
		var harga = $('#harga_menu').val()
		var qty = $('#qty_menu').val()
		
		total_sd = harga * qty
		$('#total_sd').val(total_sd)

	}
	$(document).on('keyup mouseup', '#harga_menu, #qty_menu', function(){
		hitung_edit_modal()
	})

	//save edit cart 
	$(document).on('click','#edit_cart', function(){
		var id_cart = $('#idcart_menu').val()
		var qty = $('#qty_menu').val()
		var total = $('#total_sd').val()
	if(qty == '' || qty < 1){
		alert('Qty minimal 1!')
		$('#qty_menu').focus()
	}
	else{
		$.ajax({
			type : 'POST',
			url : '<?=site_url('pos/proses')?>',
			data : {'edit_cart' : true, 'id_cart' : id_cart, 'qty' : qty, 'total' : total},
			dataType : 'json',
			success : function(result){
				if(result.success == true){
						$('#cart_table').load('<?=site_url('pos/cart_data')?>', function(){
							kalkulasi()
						})
						alert('Data berhasil di update!')
						$('#modalupdate').modal('hide');
					}else{
						alert('Gagal edit data!')
					}
			}

		})
	}
	})

	//kalkulasi itungan cart POS
	function kalkulasi(){
		var subtotal = 0;
		$('#cart_table tr').each(function() {
			subtotal += parseInt($(this).find('#total').text())
		})
		isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

		var cash = $('#cash').val()
		var diskon = $('#diskon').val()
		var grand_total = subtotal - diskon
		if (isNaN(grand_total)) {
			$('#grand_total').val(0)
			$('#grand_total2').text(0)
		} else {
			$('#grand_total').val(grand_total)
			$('#grand_total2').text(grand_total)
		}

		var cash = $('#cash').val()
		cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

		if(diskon == ''){
			$('#diskon').val(0)
		}

		if(cash == ''){
			$('#cash').val(0)
		}
	}

	$(document).on('keyup mouseup', '#diskon, #cash', function(){
		kalkulasi()
	})

	$(document).ready(function(){
		kalkulasi()
	})

	//payment
	$(document).on('click','#payment', function(){
		var tanggal = $('#tanggal').val()
		var id_user = $('#user').val()
		var sub_total = $('#sub_total').val()
		var diskon = $('#diskon').val()
		var grand_total = $('#grand_total').val()
		var cash = $('#cash').val()
		var change = $('#change').val()
		var note = $('#note').val()

		if(sub_total < 1){
			alert('Cart menu belum di input!')
		}
		else if(cash < 1){
			alert('Cash belum di input!')
		}
		else{
			if(confirm('Yakin proses transaksi ini?')){
				$.ajax({
					type: 'POST',
					url : '<?=site_url('pos/proses')?>',
					data : {'payment' : true, 'tanggal' : tanggal, 'id_user' : id_user, 'sub_total' : sub_total, 'diskon' : diskon, 'grand_total' : grand_total, 'cash' : cash, 'change' : change, 'note' : note},
					dataType : 'json',
					success: function(result){
						if(result.success){
							alert('Transaksi berhasil');
						} else {
							alert('Transaksi gagal');
						}
						location.href='<?=site_url('pos')?>'
					}
				})
			}
		}
	})
</script>