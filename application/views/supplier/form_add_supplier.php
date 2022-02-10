<section class="content-header">
	<h1> Supplier 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-truck"></i></a></li>
		<li class="active"> Supplier </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Add Supplier </h3>
				<div class="pull-right">
					<a href="<?=site_url('supplier')?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">

				<?php //echo validation_errors(); ?>
						<form action="" method="post">
							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('nama') ? 'has-error' : null?>">
								<label> Nama : </label>
								<input type="text" name="nama" value="<?=set_value('nama')?>" class="form-control">
								<?=form_error('nama')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('no_telepon') ? 'has-error' : null?>">
								<label> No Telepon : </label>
								<input type="text" name="no_telepon" value="<?=set_value('no_telepon')?>" class="form-control">
								<?=form_error('no_telepon')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('alamat') ? 'has-error' : null?>">
								<label> Alamat : </label>
								<textarea type="text" name="alamat" value="<?=set_value('alamat')?>" class="form-control" rows="5"></textarea>
								<?=form_error('alamat')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('keterangan') ? 'has-error' : null?>">
								<label> Keterangan* : </label> <small>(Opsional, tidak wajib di isi!)</small>
								<textarea type="text" name="keterangan" value="<?=set_value('keterangan')?>" class="form-control" rows="5"></textarea>
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