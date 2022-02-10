<section class="content-header">
	<h1> Stok Out
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
		<li class="active"> Transaksi </li>
		<li class="active"> Stok Out </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Add Stok Out </h3>
				<div class="pull-right">
					<a href="<?=site_url('stok_out')?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">
				<?php //echo validation_errors(); ?>
						<form action="" method="post">
							<div class="row">
							<div class="col-md-6 col-md-offset-1">
							<div class="form-group <?=form_error('tanggal') ? 'has-error' : null?>">
								<label for="tanggal"> Tanggal : </label>
								<input type="date" name="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
								<?=form_error('tanggal')?>
							</div>

							<div>
								<label for="nama"> Pilih Bahan : </label>
							</div>
							<div class="form-group input-group <?=form_error('nama') ? 'has-error' : null?>">
									<input type="hidden" name="id_bahan" id="id_bahan">
									<input type="hidden" name="id_user" id="id_user">
									<input type="hidden" name="id_stok" id="id_stok">
									<input type="text" name="nama" id="nama" class="form-control" placeholder="Pilih Bahan" readonly required>
									<span class="input-group-btn">
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-bahan">
											<i class="fa fa-search"></i> 
										</button>
									</span>	
							</div>
							</div>
						</div>

							<div class="row">
							<div class="form-group col-md-3 col-md-offset-1">
								<label> Satuan : </label>
								<input type="text" name="satuan" id="satuan" value="-" class="form-control" placeholder="-" readonly>
							</div>
							<div class="form-group col-md-3">
								<label> Stok : </label>
								<input type="text" name="nama" id="stok" value="-" class="form-control" placeholder="-" readonly>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('qty') ? 'has-error' : null?>">
								<label> Qty : </label>
								<input type="text" name="qty" value="<?=set_value('qty')?>" class="form-control">
								<?=form_error('qty')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('keterangan') ? 'has-error' : null?>">
								<label> Keterangan* : </label> <small>(Opsional)</small>
								<textarea type="text" name="keterangan" value="<?=set_value('keterangan')?>" class="form-control" rows="5" 
									placeholder="Ex : Kadaluwarsa / Rusak / ..........."></textarea>
								<?=form_error('keterangan')?>
							</div>
							</div>

							<div class="form-group col-md-6 col-md-offset-3">
								<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save </button>
								&nbsp;	
								<button type="reset" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>

</section>

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
							<th> Stok </th>
							<th> Satuan </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($bahan as $bhn => $data) { ?>
						<tr>
							<td><?=$data->nama?></td>
							<td><?=$data->stok?></td>
							<td><?=$data->satuan?></td>
							<td>
								<button type="button" class="btn btn-info btn-xs" id="select"
									data-id="<?=$data->id_bahan?>"
									data-nama="<?=$data->nama?>"
									data-stok="<?=$data->stok?>"
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
	$(document).ready(function() {
		$(document).on('click', '#select', function() {
			var id_bahan = $(this).data('id');
			var nama = $(this).data('nama');
			var stok = $(this).data('stok');
			var satuan = $(this).data('satuan');
			$('#id_bahan').val(id_bahan);
			$('#nama').val(nama);
			$('#satuan').val(satuan);
			$('#stok').val(stok);
			$('#modal-bahan').modal('hide');
		})
	})
</script>