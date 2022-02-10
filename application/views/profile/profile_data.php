<section class="content-header">
	<h1> User Profiles 
		<small> Page views </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-users"></i></a></li>
		<li class="active"> Profile </li>
	</ol>
</section>

<!--- Main Content ---->
<section class="content">
	<div class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> About Me </h3>
				<div class="box-body">
					<div class="row">
        				<div class="col-md-3">
          <!-- Profile Image -->
          				<div class="box box-default">
            			<div class="box-body box-profile">
            				<center>
              				<!-- <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
              				<img src="<?=site_url('uploads/user/'.$this->fungsi->user_login()->foto)?>"  width="250px" height="150px" class="img-circle img-responsive" alt="User Image">
              				</center>	
              					<h3 class="profile-nama text-center">
              						<?=ucfirst($this->fungsi->user_login()->nama)?> - 
              						 <?php 
						                  if (ucfirst($this->fungsi->user_login()->level) == 1)
						                  {
						                    echo "Admin";
						                  }
						                   if (ucfirst($this->fungsi->user_login()->level) == 2)
						                  {
						                    echo "Kasir";
						                  }
						                   if (ucfirst($this->fungsi->user_login()->level) == 3)
						                  {
						                    echo "Manager";
						                  }
						              ?> 
              					</h3> 
									 <p class="text-muted text-center"><?=ucfirst($this->fungsi->user_login()->email)?></p>
									 
              					<a href="<?=site_url('profile/edit/'.$this->fungsi->user_login()->id_user)?>" class="btn btn-default btn-block"><b>Edit data</b></a>
            			</div>
            <!-- /.box-body -->
          				</div>
						</div>

						<div class="col-md-9">
							<div class="box box-default">
								<p></p>
								 <form class="form-horizontal">
					                  <div class="form-group">
					                    <label for="nama" class="col-sm-2 control-label">Nama</label>
					                    <div class="col-sm-10">
					                    	<input type="hidden" name="id_user" value="<?=$this->fungsi->user_login()->id_user?>" class="form-control">
					                      <input type="text" class="form-control" id="nama" value="<?=$this->fungsi->user_login()->nama?>" disabled>
					                    </div>
					                  </div>

					                  <div class="form-group">
					                    <label for="username" class="col-sm-2 control-label">Username</label>
					                    <div class="col-sm-10">
					                      <input type="text" class="form-control" id="username" value="<?=$this->fungsi->user_login()->username?>" disabled>
					                    </div>
					                  </div>

					                  <div class="form-group">
					                    <label for="email" class="col-sm-2 control-label">Email</label>
					                    <div class="col-sm-10">
					                      <input type="email" class="form-control" id="email" value="<?=$this->fungsi->user_login()->email?>" disabled>
					                    </div>
					                  </div>

					                  <div class="form-group">
					                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
					                    <div class="col-sm-10">
					                      <input type="text" class="form-control" id="alamat" value="<?=$this->fungsi->user_login()->alamat?>" disabled></input>
					                    </div>
					                  </div>

					                  <div class="form-group">
					                    <label for="no_telepon" class="col-sm-2 control-label">No Telepon</label>
					                    <div class="col-sm-10">
					                      <input type="text" class="form-control" id="no_telepon" value="<?=$this->fungsi->user_login()->no_telepon?>" disabled>
					                    </div>
					                  </div>

					                  <div class="form-group">
					                    <label for="gaji" class="col-sm-2 control-label">Gaji</label>
					                    <div class="col-sm-10">
					                      <input type="text" class="form-control" id="gaji" value="<?=indo_currency($this->fungsi->user_login()->gaji)?>" disabled>
					                    </div>
					                  </div>

					                  <div class="form-group">
					                    <label for="level" class="col-sm-2 control-label">Level</label>
					                    <div class="col-sm-10">
					                      <input type="text" class="form-control" id="level" 
					                      value="<?php 
						                  if (ucfirst($this->fungsi->user_login()->level) == 1)
						                  {
						                    echo "Admin";
						                  }
						                   if (ucfirst($this->fungsi->user_login()->level) == 2)
						                  {
						                    echo "Kasir";
						                  }
						                   if (ucfirst($this->fungsi->user_login()->level) == 3)
						                  {
						                    echo "Manager";
						                  }
						              	  ?>" disabled>
					                    </div>
					                  </div>
					                  <hr>
					              	
               					 </form>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>