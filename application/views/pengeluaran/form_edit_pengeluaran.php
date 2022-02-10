<section class="content-header">
	<h1> Pengeluaran 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-pie-chart"></i></a></li>
		<li class="active"> Pengeluaran </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Edit Pengeluaran </h3>
				<div class="pull-right">
					<a href="<?=site_url('pengeluaran')?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">
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
								<input type="hidden" name="id_pengeluaran" value="<?=$row->id_pengeluaran?>" class="form-control">
								<input type="date" name="tanggal" value="<?=$this->input->post('tanggal') ?: $row->tanggal?>" class="form-control">
								<?=form_error('tanggal')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('jenis') ? 'has-error' : null?>">
								<label> Jenis: </label>
								<select class="form-control" name="jenis">
									<?php $jenis = $this->input->post('jenis') ?: $row->jenis?> ?>
									<option value=""> --PILIH--</option>
									<option value="Internet" <?=$jenis == 'Internet' ? "selected" : null?>> Internet </option>
									<option value="Peralatan" <?=$jenis == 'Peralatan' ? "selected" : null?>> Peralatan </option>
									<option value="PDAM" <?=$jenis == 'PDAM' ? "selected" : null?>> PDAM </option>
									<option value="PLN" <?=$jenis == 'PLN' ? "selected" : null?>> PLN </option>
									<option value="Bahan" <?=$jenis == 'Bahan' ? "selected" : null?>> Bahan </option>
								</select>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('biaya') ? 'has-error' : null?>">
								<label> Biaya : </label>
								<input type="text" name="biaya" value="<?=$this->input->post('biaya') ?: $row->biaya?>" class="form-control">
								<?=form_error('biaya')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('keterangan') ? 'has-error' : null?>">
								<label> Keterangan* : </label> <small>(Opsional!)</small>
								<textarea type="text" name="keterangan" class="form-control" rows="5"><?=$this->input->post('keterangan') ?: $row->keterangan?></textarea>
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