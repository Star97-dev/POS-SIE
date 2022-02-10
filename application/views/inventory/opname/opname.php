<section class="content-header">
	<h1> Opname
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-archive"></i></a></li>
		<li class="active" > Inventory </li>
		<li class="active" > Opname </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Opname </h3>
				<div class="pull-right">
					<a href="<?=site_url('Opname/add')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add Opname
					</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Tanggal </th>
							<th> Nama Bahan </th>
							<th> Stok Awal </th>
							<th> Stok In </th>
                            <th> Stok Out </th>
                            <th> Stok Akhir </th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach ($opname as $key => $data) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data->tanggal?></td>
							<td><?=$data->id_bahan?></td>
							<td><?=$data->stok_awal?></td>
                            <td><?=$data->stok_in?></td>
                            <td><?=$data->stok_out?></td>
                            <td><?=$data->stok_akhir?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</section>