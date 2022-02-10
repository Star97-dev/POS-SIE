<section class="content-header">
	<h1> Penjualan
		<small> Page Views </small>
	</h1>
	<ol class="breadcrumb">
		<li><i class="fa fa-barcode"></i></li>
        <li class="active">Transaksi</li>
        <li class="active">Penjualan</li>
	</ol>
</section>

<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Penjualan </h3>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Tanggal </th>
							<th> Invoice </th>
							<th> Sub Total </th>
							<th> Diskon </th>
							<th> Grand Total </th>
							<th> Cash </th>
							<th> Change </th>
							<th> Note </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach ($penjualan as $key => $data) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=indo_date($data->tanggal)?></td>
							<td><?=$data->invoice?></td>
							<td><?=indo_currency($data->sub_total)?></td>
							<td><?=indo_currency($data->diskon)?></td>
							<td><?=indo_currency($data->total)?></td>
							<td><?=indo_currency($data->cash)?></td>
							<td><?=indo_currency($data->change)?></td>
							<td><?=$data->note?></td>
							<td class="text-center" width="130px">
							<?php if($this->fungsi->user_login()->level == 3 ) { ?> 
							<a class="btn btn-xs btn-primary" id="update_penjualan" data-toggle="modal" data-target="#modal-update" 
													data-id_penjualan ="<?=$data->id_penjualan?>"
													data-tanggal ="<?=$data->tanggal?>"
													data-invoice ="<?=$data->invoice?>"
													data-sub_total ="<?=$data->sub_total?>"
													data-diskon ="<?=$data->diskon?>"
													data-grand_total ="<?=$data->total?>"
													data-cash ="<?=$data->cash?>"
													data-change ="<?=$data->change?>"
													data-note ="<?=$data->note?>"
													>
														<i class="fa fa-pencil"></i> Update
													</a>
													<?php } ?>
								<a href="<?=site_url('penjualan/detail/'.$data->id_penjualan)?>" class="btn btn-success btn-xs">
									<i class="fa fa-eye"></i> Detail
								</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<!-- Modal update penjualan -->
<div class="modal fade" id="modal-update">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"> Update Penjualan </h4>
			</div>
			<div class="modal-body">
				
				<input type="hidden" id="id_penjualan">
				<label> Tanggal : </label>
					<div class="form-group">
					<input type="text" id="tanggal" class="form-control" readonly>
				</div>
				<label> Invoice : </label>
					<div class="form-group">
					<input type="text" id="invoice" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label> Sub Total : </label>
					<input type="text" id="sub_total" value="" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="diskon"> Diskon : </label>
					<input type="number" id="diskon" value="" class="form-control">
				</div>
				<div class="form-group">
					<label> Grand Total : </label>
					<input type="number" id="grand_total" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="cash"> Cash : </label>
					<input type="number" id="cash" value="" class="form-control">
				</div>
				<div class="form-group">
					<label> Change : </label>
					<input type="number" id="change" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="note"> Note : </label>
					<textarea type="number" id="note" value="" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<div class="pull-right">
					   <button type="button" id="edit_penjualan" class="btn btn-success">
					      <i class="fa fa-paper-plane"></i> Save
					   </button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
	$(document).on('click','#update_penjualan',function(){
		var id_penjualan = $(this).data('id_penjualan')
		var tanggal = $(this).data('tanggal')
		var invoice = $(this).data('invoice')
		var sub_total = $(this).data('sub_total')
		var diskon = $(this).data('diskon')
		var grand_total = $(this).data('grand_total')
		var cash = $(this).data('cash')
		var change = $(this).data('change')
		var note = $(this).data('note')

		$('#id_penjualan').val(id_penjualan)
		$('#tanggal').val(tanggal)
		$('#invoice').val(invoice)
		$('#sub_total').val(sub_total)
		$('#diskon').val(diskon)
		$('#grand_total').val(grand_total)
		$('#cash').val(cash)
		$('#change').val(change)
		$('#note').val(note)
	})

	//Kalkulasi Penjualan
	function kalkulasi(){
		var sub_total = $('#sub_total').val()
		var diskon = $('#diskon').val()
		var grand_total = $('#grand_total').val()
		var cash = $('#cash').val()
		var change = $('#change').val()

		grand_total = sub_total - diskon
		$('#grand_total').val(grand_total)

		change = cash - grand_total
		$('#change').val(change) 
	}

	$(document).on('keyup mouseup', '#diskon, #cash', function(){
		kalkulasi()
	})

	//save penjualan
	$(document).on('click','#edit_penjualan', function(){
		var id_penjualan = $('#id_penjualan').val()
		var sub_total = $('#sub_total').val()
		var diskon = $('#diskon').val()
		var grand_total = $('#grand_total').val()
		var cash = $('#cash').val()
		var change = $('#change').val()
		var note = $('#note').val()

		$.ajax({
			type : 'POST',
			url : '<?=site_url('penjualan/proses')?>',
			data : {'edit_penjualan' : true, 'id_penjualan' : id_penjualan, 'sub_total' : sub_total, 'diskon' : diskon, 'grand_total' : grand_total, 'cash' : cash, 
					'change' : change, 'note' : note},
			dataType : 'json',
			success : function(result){
				if (result.success == true) {
					alert('Update data berhasil!')
					location.href='<?=site_url('penjualan')?>'
				} else {
					alert('Update data gagal!')
				}
			}
		})
	})
</script>