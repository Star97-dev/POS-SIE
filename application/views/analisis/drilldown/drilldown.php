    <section class="content-header">
      
      <h1> Drilldown
        <small> Page views </small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Drilldown</li>
      </ol>
      <br>
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-calculator"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Omset </span>
              <span class="info-box-number"> 
                <?php foreach($penjualan as $pj) : ?>
                  <?=indo_currency($pj->omset)?>
                <?php endforeach; ?>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Modal </span>
              <span class="info-box-number">
              <?php foreach($pengeluaran as $pg) : ?>
                  <?=indo_currency($pg->modal)?>
                <?php endforeach; ?>
              </span>
            </div>
          </div>
        </div>
        <?php $laba = $pj->omset - $pg->modal; ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Laba </span>
              <span class="info-box-number"> <?=indo_currency($laba)?></span>
            </div>
          </div>
        </div>
      </div>

      <div>
        <label> Pilih tahun : </label>
        <select name="year" id="year" style="width:140px; height:30px;">
          <option value=""> --PILIH-- </option>
          <?php foreach ($get_date as $gd => $data) {
            echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
          } ?>
        </select>
        <button type="button" style="margin-left: 10px;" id="filter_tahun"><i class="fa fa-search"></i> Search </button>
      </div>
      <div class="col-md-12" id="container"></div>
    </section>
    <br>
    <br>
    <hr>
    <div class="col-md-12">
       
         <h4><i class="fa fa-question-circle"></i> Omset: Pendapatan kotor dari penjualan </h4>
         <h4><i class="fa fa-question-circle"></i> Modal: Jumlah biaya dari pengeluaran </h4>
         <h4><i class="fa fa-question-circle"></i> Laba: Pendapatan bersih dari Omset - Modal </h4>
       
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <style>

      h4{
        text-align: left;
        padding-left: 2rem;
        
        opacity: 1;
      }

      .highcharts-figure,
      .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
      }

      #container {
        height: 500px;
        width: 100%;
        margin-top: 1em;
      }

      #filter_tahun {
        margin-top: 70px;
        margin-left: 2em;
      }

      label {
        font-size: 25px;
        font-weight: normal;
      }

      .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
      }

      .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
      }

      .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
      }

      .highcharts-data-table td,
      .highcharts-data-table th,
      .highcharts-data-table caption {
        padding: 0.5em;
      }

      .highcharts-data-table thead tr,
      .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
      }

      .highcharts-data-table tr:hover {
        background: #f1f7ff;
      }
    </style>



    <script>
      
      // Create the chart
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
      $(document).ready(function() {

        let date = new Date()

        $.ajax({
          type: 'POST',
          url: 'drilldown/getCharts',
          data: {
            'year': null
          },
          dataType: 'json',
          success: function(result) {
            console.log(result.get_series);
            options(result.get_series);
            // charts(result);
            // options.series[0].data=JSON.parse(result.getSeries);

          }
        })

        var options = function(data) {
          console.log(data)

          let series = []
          let drilldown = []
          data.forEach(function(item){
            series.push({
              name: item.bulan,
              y: (item.omset != null ? parseInt(item.omset):0),
              drilldown: item.bulan
            },)
            drilldown.push({
              name: item.bulan,
              id: item.bulan,
              data: [
                ["Omset", parseInt(item.omset)],
                ["Modal", item.stok != null ? parseInt(item.stok) : 0],
                ["Pendapatan", parseInt(item.omset) - (item.stok != null ? parseInt(item.stok) : 0)]
              ]
            })
          })

          console.log(series);
          // Create the chart
          Highcharts.chart('container', {
            chart: {
              type: 'column',
              events: {
                drilldown: function(e) {
                  console.log(e.seriesOptions.id);
                  console.log(e.seriesOptions.data);
                }
              }
            },
            title: {
                text: `Data Omset perbulan ${$('#year').val() == '' ? date.getFullYear() : $('#year').val()}`
            },
            accessibility: {
              announceNewData: {
                enabled: true
              }
            },
            xAxis: {
              type: "category"
            },
            yAxis: {
              title: {
                text: 'Total Omset perbulan'
              }

            },
            legend: {
              enabled: false
            },
            plotOptions: {
              series: {
                borderWidth: 0,
                dataLabels: {
                  enabled: true,

                }
              }
            },

            tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
            },

            series: [{
              name: "Omset",
              colorByPoint: true,
              data: series,
            }],

            drilldown: {
              series: drilldown
            },
          });
        }
        

        $('#filter_tahun').on('click', function(){
          let year = $('#year').val()
        $.ajax({
          type: 'POST',
          url: 'drilldown/getCharts',
          data: {
            'year': year
          },
          dataType: 'json',
          success: function(result) {
            console.log(result.get_series);
            options(result.get_series);
            // charts(result);
            // options.series[0].data=JSON.parse(result.getSeries);

          }
        })
        })
      })
    </script>