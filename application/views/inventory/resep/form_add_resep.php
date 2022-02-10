<section class="content-header">
	<h1> Resep 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-archive"></i></a></li>
		<li class="active" > Inventory </li>
		<li class="active"> Resep </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">
	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-plus"></i> Add resep </h3>
				<div class="pull-right">
					<a href="<?=site_url('resep')?>" class="btn btn-warning">
						<i class="fa fa-undo"></i> Back
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-offset-3">

				<?php //echo validation_errors(); ?>
							<div class="row">
								<div class="col-md-8">
									<input type="hidden" id="idcart_resep">
									<h4><label> Pilih Menu </label></h4>
									<select class="form-control" id="id_menu">
										<option value=0> --PILIH-- </option>
										<?php foreach ($menu as $mn => $data){
											echo '<option value="'.$data->id_menu.'">'.$data->nama.'</option>';
										}?>
									</select>
								<hr>

								<button type="button" class="btn btn-default btn-block" data-toggle="collapse" data-target="#pilihbahan">
									<i class="fa fa-plus"></i> Pilih Bahan </button>
								<div id="pilihbahan" class="collapse">
										<div class="row">
										<div class="col-md-8 col-md-offset-2">
											<label> Pilih Bahan : </label>
											<div class="form-group input-group">
											<input type="hidden" id="id_bahan">
											<input type="hidden" id="stok">
											<input type="text" name="nama" id="nama" class="form-control" placeholder="Pilih Bahan" readonly required>
											<span class="input-group-btn">
												<button type="button" class="btn btn-info" id="search_bahan" data-toggle="modal" data-target="#modal-bahan">
													<i class="fa fa-search"></i> 
												</button>
											</span>	
											</div>
										</div>
										</div>

									<div class="row">
										<div class="form-group col-md-4 col-md-offset-2">
											<label> Satuan : </label>
											<input type="text" name="satuan" id="satuan" class="form-control" placeholder="-" readonly>
										</div>
										<div class="form-group col-md-4">
											<label> Qty : </label>
											<input type="number" name="qty" id="qty" class="form-control" value="1" min="1">
										</div>
									</div>


									<div class="row">
										<div class="col-md-4 col-md-offset-8">
											<button type="button" id="input_cart" class="btn btn-primary"><i class="fa fa-plus"></i> Input </button>
										</div>
									</div>
								</div>
								<hr>
								</div>
							</div>

							<div class="row">
							<div class="col-md-8">
							<h4><label> Bahan Resep</label></h4>
							<table class="table table-bordered table-striped">
								<thead>
									<center>
								<tr>	
									<th> No </th>
									<th> Nama Bahan </th>
									<th> Qty </th>
									<th> Satuan</th>
									<th> Actions </th>
								</tr>
							</thead>
							<tbody id="cart_resep">
								<?php $this->load->view('inventory/resep/cart') ?>
							</tbody>
							</table>

									<div class="form-group col-md-3 col-md-offset-5">
										<button type="button" id="simpan_cart" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save </button>
										&nbsp;	
										<button type="reset" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
									</div>
						</div>
					</div>
					</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modal-bahan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-tittle"> Pilih Bahan </h3>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table0">
					<thead>
						<tr>
							<th> Nama </th>
							<th> Satuan </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($bahan as $bhn => $data) { ?>
						<tr>
							<td><?=$data->nama?></td>
							<td><?=$data->satuan?></td>
							
							<td>
								<button type="button" class="btn btn-info btn-xs" id="select"
									data-id="<?=$data->id_bahan?>"
									data-nama="<?=$data->nama?>"
									data-satuan="<?=$data->satuan?>"
									data-stok="<?=$data->stok?>"
									> 
									<i class="fa fa-check"> Select </i> 
								</button>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).on('click', '#select', function() {
	$('#id_bahan').val($(this).data('id'))
	$('#nama').val($(this).data('nama'))
	$('#satuan').val($(this).data('satuan'))
	$('#stok').val($(this).data('stok'))
	$('#modal-bahan').modal('hide')
})

	//input ke cart
	$(document).on('click', '#input_cart', function() {
		var id_bahan = $('#id_bahan').val()
		var nama = $('#nama').val()
		var qty = $('#qty').val()
		var satuan = $('#satuan').val()

		if(id_bahan == ''){
			alert('Bahan belum dipilih!')
			$('#nama').focus()
		} else if(qty == 0){
			alert('Qty min 1!')
			$('#qty').val(1)
			$('#qty').focus()
		} 
		else{
			$.ajax({
				type: 'POST',
				url: '<?=site_url('resep/proses')?>',
				data: {'input_cart' : true, 'id_bahan' : id_bahan, 'nama' : nama, 'qty' : qty, 'satuan' : satuan},
				dataType : 'json',
				success: function(result) {
					if (result.success == true) {
						$('#cart_resep').load('<?=site_url('resep/cart_resep')?>', function(){
								
						})
						$('#id_bahan').val('');
						$('#nama').val('');
						$('#qty').val(1);
						$('#satuan').val('-');
						$('#nama').focus();
						
					}
					else{
						alert('Input gagal!')
					}
				}
			})
		}
	})
	
	//delete
	$(document).on('click','#del_cart', function(){
		if(confirm('Yakin untuk menghapus?')){
			var id_cart = $(this).data('id_cart')
			var id_bahan = $('#id_bahan').val()
			var qty = $('#qty').val()
			$.ajax({
				type : 'POST',
				url : '<?=site_url('resep/cart_del')?>',
				data: {'id_cart' : id_cart, 'id_bahan' : id_bahan, 'qty' : qty},
				dataType : 'json',
				success: function(result){
					if (result.success == true ) {
						$('#cart_resep').load('<?=site_url('resep/cart_resep')?>', function(){

						})
						
					}
					else {
						alert('Input gagal')
					}
				}
			})
		}
	})

	//save resep
	$(document).on('click','#simpan_cart', function(){
		var id_menu = $('#id_menu').val()
		var id_bahan = $('#id_bahan').val()
		var nama = $('#nama').val()
		var satuan = $('#satuan').val()
		var qty = $('#qty').val()
		var stok = $('#stok').val()
		if(id_menu == 0){
			alert('Menu belum di pilih!')
		} else if(stok == 0) {
			alert('Bahan belum dipilih!')
			$('#nama').focus()
		}
		else{
			$.ajax({
				type : 'POST',
				url : '<?=site_url('resep/proses')?>',
				data : {'simpan_cart' : true, 'id_menu' : id_menu, 'id_bahan' : id_bahan, 'satuan' : satuan, 'qty' : qty},
				dataType : 'json',
				success: function(result){
					if (result.success) {
						alert('Data tersimpan!')
					} else {
						alert('Data gagal di simpan!')
					}
					location.href='<?=site_url('resep/add')?>'
				}
			})
		}
	})

</script>