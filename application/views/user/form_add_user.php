<section class="content-header">
	<h1> User 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-users"></i></a></li>
		<li class="active"> User </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-user-plus"></i> Add User </h3>
				<div class="pull-right">
					<a href="<?=site_url('user')?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">
				<?php echo form_open_multipart();?>				
							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('nama') ? 'has-error' : null?>">
								<label> Nama : </label>
								<input type="text" name="nama" value="<?=set_value('nama')?>" class="form-control">
								<?=form_error('nama')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('username') ? 'has-error' : null?>">
								<label> Username : </label>
								<input type="text" name="username" value="<?=set_value('username')?>" class="form-control">
								<?=form_error('username')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-3 col-md-offset-1 <?=form_error('password') ? 'has-error' : null?>">
								<label> Password : </label>
								<input type="password" name="password" value="<?=set_value('password')?>" class="form-control">
								<?=form_error('password')?>
							</div>
							<div class="form-group col-md-3 <?=form_error('konpass') ? 'has-error' : null?>">
								<label>  Konfirmasi Password : </label>
								<input type="password" name="konpass" value="<?=set_value('konpass')?>" class="form-control">
								<?=form_error('konpass')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-3 col-md-offset-1 <?=form_error('email') ? 'has-error' : null?>">
								<label> Email : </label>
								<input type="email" name="email" value="<?=set_value('email')?>" class="form-control">
								<?=form_error('email')?>
							</div>
							<div class="form-group col-md-3 <?=form_error('no_telepon') ? 'has-error' : null?>">
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
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('gaji') ? 'has-error' : null?>">
								<label> Gaji : </label>
								<input type="text" name="gaji" value="<?=set_value('gaji')?>" class="form-control">
								<?=form_error('gaji')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-3 col-md-offset-1 <?=form_error('level') ? 'has-error' : null?>">
								<label> Level : </label>
									<select class="form-control" name="level">
										<option value=""> --PILIH-- </option>
										<option value="1" <?=set_value('level') == 1 ? "selected" : null ?>> Admin </option>
										<option value="2" <?=set_value('level') == 2 ? "selected" : null ?>> Kasir </option>
										<option value="3" <?=set_value('level') == 3 ? "selected" : null ?>> Manager </option>
									</select>
									<?=form_error('level')?>
							</div>
							<div class="form-group col-md-3 <?=form_error('blokir') ? 'has-error' : null?>">
								<label> Blokir : </label>
								<select class="form-control" name="blokir">
									<option value=""> --PILIH-- </option>
									<option value="Y" <?=set_value('blokir') == 'Y' ? "selected" : null ?>> Yes </option>
									<option value="N" <?=set_value('blokir') == 'N' ? "selected" : null ?>> No </option>
								</select>
								<?=form_error('blokir')?>
							</div>
							</div>

							<div class="row">
							<div class="form-group col-md-6 col-md-offset-1 <?=form_error('foto') ? 'has-error' : null?>">
								<label> Foto : </label>
								<input type="file" name="foto" value="<?=set_value('foto')?>" class="form-control">
								<?=form_error('foto')?>
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