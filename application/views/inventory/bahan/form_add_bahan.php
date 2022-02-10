<section class="content-header">
	<h1> Bahan 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-archive"></i></a></li>
		<li class="active" > Inventory </li>
		<li class="active"> Bahan </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Add Bahan </h3>
				<div class="pull-right">
					<a href="<?=site_url('bahan')?>" class="btn btn-warning">
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
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('satuan') ? 'has-error' : null?>">
								<label> Satuan : </label>
								<select class="form-control" name="satuan">
										<option value=""> --PILIH-- </option>
										<option value="gram" <?=set_value('satuan') == 'gram' ? "selected" : null ?>> gram </option>
										<option value="mililiter" <?=set_value('satuan') == 'mililiter' ? "selected" : null ?>> mililiter </option>
										<option value="pcs" <?=set_value('satuan') == 'pcs' ? "selected" : null ?>> pcs </option>
									</select>
								<?=form_error('satuan')?>
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