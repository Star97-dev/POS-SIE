<title> Diskon </title>
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
				<h3 class="box-title"> Data Diskon </h3>
				<?php if($this->fungsi->user_login()->level != 3 ) { ?> 
				<div class="pull-right">
					<a href="<?= site_url('diskon/add') ?>" class="btn btn-primary">
						<i class="fa fa-plus"></i> Add Diskon
					</a>
				</div>
				<?php } ?>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Nama Diskon </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($diskon as $key => $data) { ?>
							<tr>
								<td><?= $no++ ?>.</td>
								<td><?= $data->nama ?></td>
								<td class="text-center" width="160px">
									<a id="detail" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-detail" 
									data-nama="<?=$data->nama ?>"
									data-harga_diskon="<?=$data->hargaDiskon?>" 
									data-tanggal_awal="<?=$data->tanggalAwal?>" 
									data-tanggal_akhir="<?=$data->tanggalAkhir?>" 
									>
										<i class="fa fa-eye"></i> Detail
									</a>
									 
									<a href="<?= site_url('diskon/edit') ?>" class="btn btn-primary btn-xs">
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3> Detail Diskon </h3>
			</div>
			<div id="modal_detail" class="modal-body table-responsive">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th> Nama </th>
							<td><span id="nama"></span></td>
						</tr>
						<tr>
							<th> Diskon </th>
							<td><span id="hargaDiskon"></span></td>
						</tr>
						<tr>
							<th> Tanggal Mulai </th>
							<td><span id="tanggalAwal"></span></td>
						</tr>
						<tr>
							<th> Tanggal Berakhir </th>
							<td><span id="tanggalAkhir"></span></td>
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
			var nama = $(this).data('nama');
			var hargaDiskon = $(this).data('harga_diskon');
			var tanggalAwal = $(this).data('tanggal_awal');
			var tanggalAkhir = $(this).data('tanggal_akhir');
			
			$('#nama').text(nama);
			$('#hargaDiskon').text(hargaDiskon);
			$('#tanggalAwal').text(tanggalAwal);
			$('#tanggalAkhir').text(tanggalAkhir);

			console.log(nama, hargaDiskon, tanggalAkhir)
		})
	})
	</script>
