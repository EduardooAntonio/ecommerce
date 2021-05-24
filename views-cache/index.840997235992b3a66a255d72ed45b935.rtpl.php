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

    <!-- Grafico de pizza <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      /*var data = google.visualization.arrayToDataTable([
          ['Dia', 'Valor Vendido'],
          ['<?php echo htmlspecialchars( $value1["dia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["total"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'],
          

        ]);*/

      var teste = ['Dia <?php echo htmlspecialchars( $value1["dia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["total"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'];

      function drawChart() {
        

        /*var data = google.visualization.arrayToDataTable([
          ['Dia', 'Valor Vendido'],
          teste,


        ]);*/

        for (var i = 0; i <= 3; i++) {
          data
        
              
        }

        var options = {
          title: 'Gráfico'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>  -->

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var col = ['<?php echo htmlspecialchars( $value1["dia"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["total"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'];
        /*var element = document.getElementById('element');
        element.innerHTML = "<?php $counter2=-1;  if( isset($pg) && ( is_array($pg) || $pg instanceof Traversable ) && sizeof($pg) ) foreach( $pg as $key2 => $value2 ){ $counter2++; ?>";
        var element2 = document.getElementById('element');
        element2.innerHTML = "<?php } ?>";*/
        


        //for (var i = 0; i >= 3; i++) {
          var data = google.visualization.arrayToDataTable([
          ['Dia', 'Valor'],
          col

        ]);
        //}
        

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <!-- grafico de pizza <div id="piechart" style="width: 2000px; height: 800px;"></div> -->
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    <?php } ?>
    </section>

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