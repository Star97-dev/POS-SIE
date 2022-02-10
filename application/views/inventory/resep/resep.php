<section class="content-header">
	<h1> Resep
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-archive"></i></a></li>
		<li class="active"> Inventory </li>
		<li class="active"> Resep </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Resep </h3>
				<div class="pull-right">
					<a href="<?= site_url('resep/add') ?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add Resep
					</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Nama </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($resep as  $data) : ?>
							<tr>
								<td><?= $no++ ?>.</td>
								<td><?= $data->nama_menu ?></td>

								<td class="text-center" width="100px">
									<a href="<?= site_url('resep/detail/'.$data->id_menu) ?>" class="btn btn-success btn-xs">
									 <i class="fa fa-eye"></i> Detail
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

