<section class="content-header">
	<h1> Bahan
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-archive"></i></a></li>
		<li class="active" > Inventory </li>
		<li class="active" > Bahan </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Bahan </h3>
				<div class="pull-right">
					<a href="<?=site_url('bahan/add')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add bahan
					</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Nama </th>
							<th> Stok </th>
							<th> Satuan </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach ($bahan as $key => $data) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data->nama?></td>
							<td><?=$data->stok?></td>
							<td><?=$data->satuan?></td>
							<td class="text-center" width="150px">
								<a href="<?=site_url('bahan/edit/'.$data->id_bahan)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-edit"></i> Update
								</a>
								<a href="<?=site_url('bahan/del/'.$data->id_bahan)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger btn-xs">
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