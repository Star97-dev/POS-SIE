<section class="content-header">
	<h1> Pembelian 
		<small> page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
		<li class="active"> Pembelian </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">
	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data pembelian </h3>
				<div class="pull-right">
					<a href="<?=site_url('pembelian/add')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add pembelian
					</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Tanggal </th>
							<th> Nama </th>
							<th> Qty </th>
							<th> Supplier </th>
							<th> Keterangan </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach ($pembelian as $key => $data) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=indo_date($data->tanggal)?></td>
							<td><?=$data->bahan_name?></td>
							<td><?=$data->qty?></td>
							<td><?=$data->supplier_name?></td>
							<td><?=$data->keterangan?></td>
							<td class="text-center" width="150px">
								<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-detail">
									<i class="fa fa-eye"></i> Detail
								</a>
								<a href="<?=site_url('pembelian/del/'.$data->id_pembelian.'/'.$data->id_bahan)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger btn-xs">
									<i class="fa fa-trash"></i> Delete
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
				<h3> Detail Pembelian </h3>
			</div>
			<div class="modal-body table-responsive">
				tes
			</div>
		</div>
	</div>
</div>