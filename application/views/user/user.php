<title> User </title>
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
				<h3 class="box-title"> Data Users </h3>
				<?php if($this->fungsi->user_login()->level != 3 ) { ?> 
				<div class="pull-right">
					<a href="<?= site_url('user/add') ?>" class="btn btn-primary">
						<i class="fa fa-user-plus"></i>Add User
					</a>
				</div>
				<?php } ?>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Nama </th>
							<th> Level </th>
							<th> Blokir </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($user as $key => $data) { ?>
							<tr>
								<td><?= $no++ ?>.</td>
								<td><?= $data->nama ?></td>
								<td>
									<?php
									if ($data->level == 1) {
										echo 'Admin';
									}
									if ($data->level == 2) {
										echo 'Kasir';
									}
									if ($data->level == 3) {
										echo 'Manager';
									}
									?>
								</td>
								<td><?= $data->blokir ?></td>
								<td class="text-center" width="160px">
									<a id="detail" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-detail" 
									data-nama="<?= $data->nama ?>" 
									data-username="<?= $data->username ?>" 
									data-email="<?= $data->email ?>" 
									data-alamat="<?= $data->alamat ?>" 
									data-no_telepon="<?= $data->no_telepon ?>" 
									data-foto="<?= $data->foto ?>" 
									data-level="<?= $data->level ?>"
									data-blokir="<?= $data->blokir ?>">
										<i class="fa fa-eye"></i> Detail
									</a>
									 
									<a href="<?= site_url('user/edit/' . $data->id_user) ?>" class="btn btn-primary btn-xs">
										<i class="fa fa-edit"></i> Update
									</a>
									
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-detail">
	<?php echo form_open_multipart(); ?>
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3> Detail User </h3>
			</div>
			<div id="modal_detail" class="modal-body table-responsive">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th> Foto </th>
							<td>
							<img id="foto" width="100px" height="100px">
							
							</td>
						</tr>
						<tr>
							<th> Nama </th>
							<td><span id="nama"></span></td>
						</tr>
						<tr>
							<th> Username </th>
							<td><span id="username"></span></td>
						</tr>
						<tr>
							<th> Email </th>
							<td><span id="email"></span></td>
						</tr>
						<tr>
							<th> Alamat </th>
							<td><span id="alamat"></span></td>
						</tr>
						<tr>
							<th> No Telepon </th>
							<td><span id="no_telepon"></span></td>
						</tr>
						<tr>
							<th> Level </th>
							<td><span id="level">

								</span></td>
						</tr>
						<tr>
							<th> Blokir </th>
							<td><span id="blokir"></span></td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$(document).on('click', '#detail', function() {
			var foto = $(this).data('foto');
			var nama = $(this).data('nama');
			var username = $(this).data('username');
			var email = $(this).data('email');
			var alamat = $(this).data('alamat');
			var no_telepon = $(this).data('no_telepon');
			var level = $(this).data('level');
			var blokir = $(this).data('blokir');
			
			
			if(level == 1){
				$('#level').text('Admin');
			} else if(level == 2){
				$('#level').text('Kasir');
			} else {
				$('#level').text('Manager');
			}
			
			$('#foto').attr('src', 'uploads/user/'+foto );
			$('#nama').text(nama);
			$('#username').text(username);
			$('#email').text(email);
			$('#alamat').text(alamat);
			$('#no_telepon').text(no_telepon);
			$('#blokir').text(blokir);
		})
	})
	</script>
