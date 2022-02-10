<section class="content-header">
	<h1> Opname 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-archive"></i></a></li>
		<li class="active" > Inventory </li>
		<li class="active"> Opname </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Add Opname </h3>
				<div class="pull-right">
					<a href="<?=site_url('Opname')?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">

				<?php //echo validation_errors(); ?>
						<form action="" method="post">
							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('tanggal') ? 'has-error' : null?>">
								<label> Tanggal : </label>
								<input type="date" name="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
								<?=form_error('tanggal')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('bahan') ? 'has-error' : null?>">
								<label> Pilih Bahan : </label>
								    <select class="form-control" id="id_bahan" name="bahan">
										<option value=0> --PILIH-- </option>
										<?php foreach ($bahan as $bhn => $data){
											echo '<option value="'.$data->id_bahan.'">'.$data->nama.'</option>';
										}?>
									</select>
								<?=form_error('bahan')?>
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