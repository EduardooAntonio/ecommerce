<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bem-vindo a Administração
        <small>Página inicial</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
      
     <?php $counter1=-1;  if( isset($order) && ( is_array($order) || $order instanceof Traversable ) && sizeof($order) ) foreach( $order as $key1 => $value1 ){ $counter1++; ?>
    <br>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

      

          var data = google.visualization.arrayToDataTable([
          ['Dia', 'Valor'],
          [<?php echo htmlspecialchars( $value1["dia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["total"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]
          
        ]);

        
        

        var options = {
          chart: {
            title: 'Vendas do Mês',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <!-- grafico de pizza <div id="piechart" style="width: 2000px; height: 800px;"></div> -->
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    
    </section>
    <?php } ?>
    <!-- Main content -->
    <section class="content">
      <style type="text/css">
      img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
      }
      </style>
      <!--
      <div>
        <br><br><br><br><br><br><br>
      <img src="/res/site/img/iconefundo.png"/>

     </div> 
      -->

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->