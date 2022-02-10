<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Dashboard
        <small> Page views </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?> 
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-cutlery"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Menu </span>
              <span class="info-box-number"> <?=$this->fungsi->hitung_menu()?> </span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> User </span>
              <span class="info-box-number"> <?=$this->fungsi->hitung_user()?>  </span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Supplier </span>
              <span class="info-box-number"> <?=$this->fungsi->hitung_supplier()?>  </span>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      
      <div class="box box-solid">
        <div class="box-header">
          <i class="fa fa-th"></i>
          <h3 class="box-tittle"> Produk Terlaris! </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-sm" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <div id="chart_penjualan" class="graph"></div>
        </div>
      </div>

    </section>
    <!-- /.content -->


    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/morris.js/morris.css">
    
    <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/morris.js/morris.min.js"></script>
    
    
    <script>
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'chart_penjualan',
      resize: true,
      data: [
        <?php foreach($row as $key => $data) {
          echo "{ menu:'".$data->nama."', Sold:'".$data->sold."'},";
        } ?>
      ],
      barColors: ['#2F4F4F'],
      xkey: 'menu',
      ykeys: ['Sold'],
      labels: ['Sold'],
      hideHover: 'auto'
    });
  
    </script>
    