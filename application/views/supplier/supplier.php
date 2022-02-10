<section class="content-header">
	<h1> Supplier 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-truck"></i></a></li>
		<li class="active"> Supplier </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Supplier </h3>
				<div class="pull-right">
					<a href="<?=site_url('supplier/add')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add Supplier
					</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Nama </th>
							<th> No Telepon </th>
							<th> Alamat </th>
							<th> Keterangan </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach ($supplier as $key => $data) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data->nama?></td>
							<td><?=$data->no_telepon?></td>
							<td><?=$data->alamat?></td>
							<td><?=$data->keterangan?></td>
							<td class="text-center" width="150px">
								<a href="<?=site_url('supplier/edit/'.$data->id_supplier)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-edit"></i> Update
								</a>
								<a href="<?=site_url('supplier/del/'.$data->id_supplier)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger btn-xs">
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