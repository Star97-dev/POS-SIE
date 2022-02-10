<section class="content-header">
	<h1> Resep
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-archive"></i></a></li>
		<li class="active"> Inventory </li>
		<li class="active"> Resep </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Detail Resep </h3>
				<div class="pull-right">
					<a href="<?= site_url('resep') ?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">
					<form action="" method="post">
						<div class="row">
							<div class="form-group col-md-6 col-md-offset-1">
								<label>
									<h4><b> Nama Menu : </b></h4>
								</label>
								<?php foreach ($menu as $mn) : ?>
									<input type="hidden" name="id_menu" value="<?= $mn->id_menu ?>" class="form-control">
									<input type="text" name="nama" value="<?= $mn->nama ?>" class="form-control" readonly>
									<?= form_error('nama') ?>
								<?php endforeach; ?>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8 col-md-offset-0">
								<table class="table table-bordered table-striped" id="table0">
									<thead>
										<tr>
											<th> Nama Bahan</th>
											<th> Qty </th>
											<th> Satuan </th>
											<th> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($detail as $dt) : ?>
											<tr>
												<td><?= $dt->nama_bahan ?></td>
												<td><?= $dt->qty ?></td>
												<td><?= $dt->satuan_detail ?></td>
												<td class="text-center" width="150px">
													<a class="btn btn-xs btn-primary" id="update_detail" data-toggle="modal" data-target="#modal-update" 
													data-id_detail_resep="<?=$dt->id_detail_resep?>"
													data-id_bahan_detail="<?=$dt->id_bahan_detail?>"
													data-nama_bahan="<?= $dt->nama_bahan ?>" 
													data-qty="<?= $dt->qty ?>" 
													data-satuan_detail="<?= $dt->satuan_detail ?>
													">
														<i class="fa fa-pencil"></i> Update
													</a>
													<a id="del_detail" class="btn btn-danger btn-xs" data-id_detail_resep="<?=$dt->id_detail_resep?>">
														<i class="fa fa-trash"></i> Delete
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>.
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal Form edit detail bahan -->
<div class="modal fade" id="modal-update">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"> Update Detail Resep </h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_detail_resep">
				<input type="hidden" id="id_bahan">
				<label> Nama bahan : </label>
				<div class="form-group input-group">
					<input type="text" id="nama_detail" class="form-control" readonly required>
					<span class="input-group-btn">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-bahan">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
				<div class="form-group">
					<label for="qty"> Qty : </label>
					<input type="text" id="qty_detail" class="form-control">
				</div>
				<div class="form-group">
					<label for="satuan"> Satuan : </label>
					<input type="text" id="satuan_detail" value="" class="form-control" readonly>
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


<!-- Modal select bahan -->
<div class="modal fade" id="modal-bahan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-tittle"> Pilih Bahan </h3>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th> Nama </th>
							<th> Satuan </th>
							<th width="100px"> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($bahan as $bhn => $data) { ?>
						<tr>
							<td><?=$data->nama?></td>
							<td><?=$data->satuan?></td>
							<td>
								<button type="button" class="btn btn-info btn-xs" id="select"
									data-id="<?=$data->id_bahan?>"
									data-nama="<?=$data->nama?>"
									data-satuan="<?=$data->satuan?>"
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
	$(document).on('click', '#update_detail', function() {
		var id_detail = $(this).data('id_detail_resep');
		var id_bahan = $(this).data('id_bahan_detail');
		var nama = $(this).data('nama_bahan');
		var qty = $(this).data('qty');
		var satuan_detail = $(this).data('satuan_detail');

		$('#id_detail_resep').val(id_detail)
		$('#id_bahan').val(id_bahan)
		$('#nama_detail').val(nama)
		$('#qty_detail').val(qty)
		$('#satuan_detail').val(satuan_detail)
	})

	$(document).on('click','#select', function(){
		var id = $(this).data('id')
		var nama = $(this).data('nama')
		var satuan = $(this).data('satuan')

		$('#id_bahan').val(id)
		$('#nama_detail').val(nama)
		$('#satuan_detail').val(satuan)
		$('#modal-bahan').modal('hide')
	})

	//Save edit detail
	$(document).on('click','#edit_detail', function(){
		var id_detail_resep = $('#id_detail_resep').val()
		var id_bahan = $('#id_bahan').val()
		var nama = $('#nama_detail').val()
		var qty = $('#qty_detail').val()
		var satuan = $('#satuan_detail').val()

		if(qty < 1 || qty == ''){
			alert('Qty min bernilai 1!')
			$('#qty_detail').val(1)
			$('#qty_detail').focus()
		}
		else{
			$.ajax({
				type : 'POST',
				url : '<?=site_url('resep/proses')?>',
				data : {'edit_detail' : true, 'id_detail_resep' : id_detail_resep, 'id_bahan' : id_bahan, 'qty' : qty, 'satuan' : satuan},
				dataType : 'json',
				success : function(result) {
					if(result.success == true){
						alert('Update data berhasil!')
					}else{
						alert('Update data gagal!')
					}
					location.href='<?=site_url('resep/detail/'.$mn->id_menu)?>'
				}
			})
		}
	})

	$(document).on('click','#del_detail', function(){
		if (confirm('Yakin menghapus data?')) {
			var id_detail_resep = $(this).data('id_detail_resep')
			$.ajax({
				type : 'POST',
				url : '<?=site_url('resep/proses')?>',
				data : {'del_detail' : true, 'id_detail_resep' : id_detail_resep},
				dataType : 'json',
				success : function(result){
					if (result.success == true) {
						location.href='<?=site_url('resep/detail/'.$mn->id_menu)?>'
					} 
				}
			})
		}
	})
</script>