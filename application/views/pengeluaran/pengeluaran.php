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
				<h3 class="box-title"> Data Pengeluaran </h3>
				<?php if($this->fungsi->user_login()->level != 3 ) { ?> 
				<div class="pull-right">
					<a href="<?=site_url('pengeluaran/add')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add Pengeluaran
					</a>
				</div>
				<?php } ?>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Tanggal </th>
							<th> Jenis </th>
							<th> Biaya </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach ($pengeluaran as $key => $data) { ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=indo_date($data->tanggal)?></td>
							<td><?=$data->jenis?></td>
							<td><?=indo_currency($data->biaya)?></td>
							<td class="text-center" width="150px">
								<a id="detail" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-detail"
								data-nama_user="<?=$data->nama_user?>"
								data-tanggal="<?=indo_date($data->tanggal)?>"
								data-jenis="<?=$data->jenis?>"
								data-biaya="<?=$data->biaya?>"
								data-keterangan="<?=$data->keterangan?>"
								>
									<i class="fa fa-eye"></i> Detail
								</a>
								<?php if($this->fungsi->user_login()->level != 3 ) { ?> 
								<a href="<?=site_url('pengeluaran/edit/'.$data->id_pengeluaran)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-edit"></i> Update
								</a>
								<?php } ?>
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3> Detail Pengeluaran </h3>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th> User Input </th>
							<td><span id="nama_user"></span></td>
						</tr>
						<tr>
							<th> Tanggal </th>
							<td><span id="tanggal"></span></td>
						</tr>
						<tr>
							<th> Jenis </th>
							<td><span id="jenis"></span></td>
						</tr>
						<tr>
							<th> Biaya </th>
							<td><span id="biaya"></span></td>
						</tr>
						<tr>
							<th> Keterangan </th>
							<td><span id="keterangan"></span></td>
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
			var nama_user = $(this).data('nama_user');
			var tanggal = $(this).data('tanggal');
			var jenis = $(this).data('jenis');
			var biaya = $(this).data('biaya');
			var keterangan = $(this).data('keterangan');
			$('#nama_user').text(nama_user);
			$('#tanggal').text(tanggal);
			$('#jenis').text(jenis);
			$('#biaya').text(biaya);
			$('#keterangan').text(keterangan);	
		})
	})
</script>