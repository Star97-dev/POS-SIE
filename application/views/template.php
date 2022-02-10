
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> [Nama kafe] </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('dashboard')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">[NKF]</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>[Nama Kafe]</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=site_url('uploads/user/'.$this->fungsi->user_login()->foto)?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->username)?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=site_url('uploads/user/'.$this->fungsi->user_login()->foto)?>" class="img-circle" alt="User Image">

                <p>
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
                  
                  <small><?=$this->fungsi->user_login()->email?></small>
                </p>
              </li>
          </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="<?=site_url('profile/index/'.$this->fungsi->user_login()->id_user)?>"><i class="fa fa-user"></i> Profile</a>
                <a href="<?=site_url('profile/ubah_pass/'.$this->fungsi->user_login()->id_user)?>"><i class="fa fa-unlock-alt"></i> Ubah Password</a>
                <a href="<?=site_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Logout</a>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=site_url('uploads/user/'.$this->fungsi->user_login()->foto)?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucfirst($this->fungsi->user_login()->nama)?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>

        <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?>
        <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?=base_url('dashboard')?>"><i class="fa fa-tachometer"></i> <span> Dashboard </span></a>
        </li>
        <?php } ?>
        
        <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li <?=$this->uri->segment(1) == 'Supplier' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('Supplier')?>"><i class="fa fa-truck"></i> <span> Supplier </span></a>
        </li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li class="treeview <?=$this->uri->segment(1) == 'menu' || $this->uri->segment(1) == 'resep' ||
                               $this->uri->segment(1) == 'bahan' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-archive"></i> <span> Inventory </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'menu' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('menu')?>"><i class="fa fa-circle-o"></i> Menu </a>
            </li>
            <li <?=$this->uri->segment(1) == 'resep' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('resep')?>"><i class="fa fa-circle-o"></i> Resep </a>
            </li>
            <li <?=$this->uri->segment(1) == 'bahan' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('bahan')?>"><i class="fa fa-circle-o"></i> Bahan </a>
            </li>
            <li <?=$this->uri->segment(1) == 'opname' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('opname')?>"><i class="fa fa-circle-o"></i> Stok Opname </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?> 
        <li class="treeview <?=$this->uri->segment(1) == 'stok_in' || $this->uri->segment(1) == 'stok_out' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span> Transaksi </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'stok_in' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('stok_in')?>"><i class="fa fa-circle-o"></i> Stok In </a>
            </li>
            <li <?=$this->uri->segment(1) == 'stok_out' ? 'class="active"' : '' ?>>
              <a href="<?=site_url('stok_out')?>"><i class="fa fa-circle-o"></i> Stok Out </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?>
        <li <?=$this->uri->segment(1) == 'pengeluaran' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('pengeluaran')?>"><i class="fa fa-pie-chart"></i> <span> Pengeluaran </span></a>
        </li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 3) { ?>
        <li><a href="<?=site_url('penjualan')?>"><i class="fa fa-calendar-o"></i> <span> Penjualan </span></a></li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 3) { ?>
          <li class="treeview-menu">
            <li><a href="<?=site_url('Drilldown')?>"><i class="fa fa-bar-chart"></i> Drilldown </a></li>
          </li>
        <?php } ?>

        <!-------- Kasir----------------->
        <?php if($this->fungsi->user_login()->level == 2) { ?>
        <li <?=$this->uri->segment(1) == 'dashboard' ? 'class="active"' : ''?>>
          <a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span> Dashboard </span></a>
        </li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 2) { ?>
        <li <?=$this->uri->segment(1) == 'diskon' ? 'class="active"' : ''?>>
          <a href="<?=site_url('diskon')?>"><i class='fa fa-tags'></i> <span> Diskon </span></a>
        </li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 2) { ?>
        <li class="treeview <?=$this->uri->segment(1) == 'pos' || $this->uri->segment(1) == 'penjualan' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-barcode"></i> <span> Transaksi </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'pos' ? 'class="active"' : ''?>>
              <a href="<?=site_url('pos')?>"><i class="fa fa-circle-o"></i> POS </a>
            </li>
            <li <?=$this->uri->segment(1) == 'penjualan' ? 'class="active"' : ''?>>
              <a href="<?=site_url('penjualan')?>"><i class="fa fa-circle-o"></i> Penjualan </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <?php if($this->fungsi->user_login()->level == 2) { ?>
        <li <?=$this->uri->segment(1) == 'menu' ? 'class="active"' : ''?>>
          <a href="<?=site_url('menu')?>"><i class='fa fa-cutlery'></i> <span> Menu </span></a>
        </li>
        <?php } ?>
        
        <li class="header"> SETTINGS </li>
        <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?>
        <li <?=$this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('user')?>"><i class="fa fa-users"></i> <span> User </span></a>
        </li>
      <?php } ?>

        <li><a href="<?=site_url('auth/logout')?>"><i class="fa fa-sign-out"></i> <span> Logout </span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $contents ?> 
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2020 <a href="#">STAR</a>.</strong> All rights
    reserved.
  </footer>

 

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>


<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
    $('#table0').DataTable()
  })
</script>
  
</body>
</html>
