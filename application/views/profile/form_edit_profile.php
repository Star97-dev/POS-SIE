<section class="content-header">
	<h1> User Profiles
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
				<h3 class="box-title"><i class="fa fa-edit"></i> Edit Profile User </h3>
				<div class="pull-right">
					<a href="<?= site_url('profile/index') ?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">
					<?php echo form_open_multipart(); ?>
					<div class="row">
						<div class="form-group col-md-3 col-md-offset-1 <?= form_error('nama') ? 'has-error' : null ?>">
							<label> Nama : </label>
							<input type="hidden" name="id_user" value="<?= $row->id_user ?>" class="form-control">
							<input type="text" name="nama" value="<?= $this->input->post('nama') ?: $row->nama ?>" class="form-control">
							<?= form_error('nama') ?>
						</div>
						<div class="form-group col-md-3 <?= form_error('username') ? 'has-error' : null ?>">
							<label> Username : </label>
							<input type="text" name="username" value="<?= $this->input->post('username') ?: $row->username ?>" class="form-control">
							<?= form_error('username') ?>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-3 col-md-offset-1 <?= form_error('email') ? 'has-error' : null ?>">
							<label> Email : </label>
							<input type="email" name="email" value="<?= $this->input->post('email') ?: $row->email ?>" class="form-control">
							<?= form_error('email') ?>
						</div>
						<div class="form-group col-md-3 <?= form_error('no_telepon') ? 'has-error' : null ?>">
							<label> No Telepon : </label>
							<input type="text" name="no_telepon" value="<?= $this->input->post('no_telepon') ?: $row->no_telepon ?>" class="form-control">
							<?= form_error('no_telepon') ?>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6 col-md-offset-1 <?= form_error('alamat') ? 'has-error' : null ?>">
							<label> Alamat : </label>
							<textarea type="text" name="alamat" class="form-control" rows="5"><?= $this->input->post('alamat') ?: $row->alamat ?></textarea>
							<?= form_error('alamat') ?>
						</div>
					</div>

					

						<div class="row">
							<div class="form-group col-md-6 col-md-offset-1">
								<label> Foto : </label>
								<div style="margin-bottom: 4px;">
									<img src="<?= base_url('uploads/user/' . $row->foto) ?>" style="width:100px">
								</div>
								<input type="file" name="foto" class="form-control">
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