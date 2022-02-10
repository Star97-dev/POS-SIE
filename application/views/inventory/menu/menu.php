<section class="content-header">
	<h1> Menu
		<small> Page views </small>
	</h1>
	<?php if($this->fungsi->user_login()->level == 1 ) { ?> 
	<ol class="breadcrumb">
		<li><i class="fa fa-archive"></i></li>
		<li class="active" > Inventory </li>
		<li class="active"> Menu </li>
	</ol>
	<?php } ?>

	<?php if($this->fungsi->user_login()->level == 2 ) { ?> 
	<ol class="breadcrumb">
		<li><i class="fa fa-cutlery"></i></li>
		<li class="active"> Menu </li>
	</ol>
	<?php } ?>
</section>

<!--- Main Content ---->
<section class="content">

	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> Data Menu </h3>
				<div class="pull-right">
					<?php if($this->fungsi->user_login()->level == 1 ) { ?> 
					<a href="<?=site_url('menu/add')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>Add menu
					</a>
					<?php } ?>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th width="50px"> No. </th>
							<th> Nama </th>
							<th> Jenis </th>
							<th> Harga </th>
							<?php if($this->fungsi->user_login()->level == 1 ) { ?> 
							<th> Actions </th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach ($menu as $key => $data) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data->nama?></td>
							<td><?=$data->jenis?></td>
							<td><?=indo_currency($data->harga)?></td>
							<?php if($this->fungsi->user_login()->level == 1 ) { ?> 
							<td class="text-center" width="150px">
								<a href="<?=site_url('menu/edit/'.$data->id_menu)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-edit"></i> Update
								</a>
								<a href="<?=site_url('menu/del/'.$data->id_menu)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger btn-xs">
									<i class="fa fa-trash"></i> Delete
								</a>
							</td>
							<?php } ?>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</section>