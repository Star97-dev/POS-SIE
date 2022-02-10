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
				<h3 class="box-title"><i class="fa fa-plus"></i> Edit Detail Resep</h3>
				<div class="pull-right">
					<a href="<?= site_url('resep/edit/' . $dt->id_menu) ?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">
					<form action="" method="post">

						<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?= form_error('id_bahan') ? 'has-error' : null ?>">
								<label> Nama bahan : </label>
								<select class="form-control" name="id_bahan" id="id_bahan">
									<?php $nama_bahan = $this->input->post('id_bahan') ?: $dt->id_bahan ?> ?>
									<option value="0"> --PILIH--</option>
									<?php foreach ($bahan as $bhn) : ?>
										<option value="<?= $bhn->id_bahan ?>" <?php if ($nama_bahan == $bhn->id_bahan) 
										{echo 'selected="selected"';} ?>><?= $bhn->nama ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?= form_error('qty') ? 'has-error' : null ?>">
								<label> Qty: </label>
								<input type="hidden" name="id_menu" value="<?=$this->input->post('id_menu') ?: $dt->id_menu?>" class="form-control">
								<input type="hidden" name="id_detail_resep" value="<?=$this->input->post('id_detail_resep') ?: $dt->id_detail_resep?>" class="form-control">
								<input type="number" name="qty" value="<?= $this->input->post('qty') ?: $dt->qty ?>" class="form-control">
								<?= form_error('qty') ?>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('satuan') ? 'has-error' : null?>">
								<label> Satuan : </label>
									<input id="satuan" type="text" name="satuan" value="<?=$this->input->post('satuan') ?: $dt->satuan?>" class="form-control" readonly>
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

<script>
$(document).ready(function(){
	function detail_resep(){
		var id = $('id_bahan').val()
		var nama_bahan = $('#nama_bahan').val()
		var satuan = $('#satuan').val()

		if(nama_bahan == id){
			
		}
	}
	var_dump(id);
	
	$(document).on('keyup mouseup', '#id_bahan, #nama_bahan, #satuan', function(){
		detail_resep()
	})
})
</script>