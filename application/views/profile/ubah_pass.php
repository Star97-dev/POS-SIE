<section class="content-header">
	<h1> Profiles  
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-users"></i></a></li>
		<li class="active"> Profile </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-edit"></i> Ubah Password </h3>
				<div class="pull-right">
					<a href="<?=site_url('dashboard')?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
				<div class="box-body">
					<div class="col-md-offset-3">
						<form action="" method="post">
							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('old') ? 'has-error' : null?>">
								<label> Password Lama: </label>
								<input type="hidden" name="id_user" value="" class="form-control">
								<input type="password" name="old" value="<?=$this->input->post('old')?>" class="form-control">
								<?=form_error('old')?>
							</div>
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('new') ? 'has-error' : null?>">
								<label> Password Baru: </label>
								<input type="password" name="new" value="<?=$this->input->post('new')?>" class="form-control">
								<?=form_error('new')?>
							</div>
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('konpass') ? 'has-error' : null?>">
								<label> Konfirmasi Password Baru : </label>
								<input type="password" name="konpass" value="" class="form-control">
								<?=form_error('konpass')?>
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