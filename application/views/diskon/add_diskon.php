<section class="content-header">
	<h1> Diskon 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-tags"></i></a></li>
		<li class="active"> Diskon </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Add Diskon </h3>
				<div class="pull-right">
					<a href="<?=site_url('diskon')?>" class="btn btn-warning">
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
								<label> Nama Diskon : </label>
								<input type="text" name="nama" value="<?=set_value('nama')?>" class="form-control">
								<?=form_error('nama')?>
							</div>
							</div>

                            <div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('hargaDiskon') ? 'has-error' : null?>">
								<label> Diskon : </label>
								<input type="text" name="hargaDiskon" value="<?=set_value('hargaDiskon')?>" class="form-control">
								<?=form_error('hargaDiskon')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-3 col-md-offset-1 <?=form_error('tanggalAwal') ? 'has-error' : null?>">
								<label> Tanggal Mulai : </label>
									<input type="date" class="form-control" name="tanggalAwal" id="tanggalAwal">
									<?=form_error('tanggalAwal')?>
							</div>
							<div class="form-group col-md-3 <?=form_error('tanggalAkhir') ? 'has-error' : null?>">
								<label> Tanggal Berakhir : </label>
								<input type="date" class="form-control" name="tanggalAkhir" id="tanggalAkhir">
								<?=form_error('tanggalAkhir')?>
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


							