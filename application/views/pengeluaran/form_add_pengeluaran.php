<section class="content-header">
	<h1> Pengeluaran 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-truck"></i></a></li>
		<li class="active"> Pengeluaran </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Add pengeluaran </h3>
				<div class="pull-right">
					<a href="<?=site_url('pengeluaran')?>" class="btn btn-warning">
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
								<input type="text" name="nama" value="<?=$this->fungsi->user_login()->nama?>" class="form-control" readonly>
								<?=form_error('nama')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('tanggal') ? 'has-error' : null?>">
								<label> Tanggal : </label>
								<input type="date" name="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
								<?=form_error('tanggal')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('jenis') ? 'has-error' : null?>">
								<label> jenis : </label>
								<select class="form-control" name="jenis">
										<option value=""> --PILIH-- </option>
										<option value="Internet" <?=set_value('jenis') == 'Internet' ? "selected" : null ?>> Internet </option>
										<option value="Peralatan" <?=set_value('jenis') == 'Peralatan' ? "selected" : null ?>> Peralatan </option>
										<option value="PDAM" <?=set_value('jenis') == 'PDAM' ? "selected" : null ?>> PDAM </option>
										<option value="PLN" <?=set_value('jenis') == 'PLN' ? "selected" : null ?>> PLN </option>
									</select>
								<?=form_error('jenis')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('biaya') ? 'has-error' : null?>">
								<label> Biaya : </label>
								<input type="text" name="biaya" value="<?=set_value('biaya')?>" class="form-control">
								<?=form_error('biaya')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('keterangan') ? 'has-error' : null?>">
								<label> Keterangan* : </label> <small>(Opsional)</small>
								<textarea type="text" name="keterangan" value="<?=set_value('keterangan')?>" class="form-control" rows="5" 
									placeholder="Ex : Nama Alat / Pembayaran Lunas / ..........."></textarea>
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