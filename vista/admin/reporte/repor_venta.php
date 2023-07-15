<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ventas</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="../../../css/material.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/home.css">
    <link rel="stylesheet" href="../../../css/loader.css">
</head>
    <body>
    <a class="btn btn success" href="../tablas/tabla_venta.php" style="margin-left: 3.6%; margin-top:3%; position:absolute;">  
    <i class="bi bi-chevron-left" style="padding:10px 14px 10px 10px; color:#fff; font-size:15px; background-color:#0d6efd; border-radius:10px;"> REGRESAR</i>
    </a>

        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center" style="padding:60px 0px 30px 0px;">
              
              <h3 style="color:#edb512 !important; font-weight:bold;">
                Reportes de Ventas
              </h3>
            </div>
          </div>
        </div>


      <section>
          <div class="container">
            <div class="row">
              
              <div class="col-md-12 text-center mt-5">
                <form action="../excel/excel_venta.php" method="post" accept-charset="utf-8">
                  <div class="row">
                    <div class="col">
                      <label style="color:#edb612; font-zise:10px; text-align:right;">Fecha inicial</label>
                      <input type="date" name="fecha_ingreso" class="form-control"  placeholder="Fecha de Inicio" required>
                    </div>
                    <div class="col">
                      <label style="color:#edb612; font-zise:10px; text-align:right;">Fecha final</label>
                      <input type="date" name="fechaFin" class="form-control" placeholder="Fecha Final" required>
                    </div>
                    <div class="col" style="padding-top:20px;">
                      <span class="btn btn-dark mb-2" action="filtro_venta.php" id="filtro">Filtrar</span>
                      <button type="submit" class="btn btn-danger mb-2">Descargar Reporte</button>
                    </div>
                  </div>
                </form>
              </div>

              
              
              
            <div class="table-responsive resultadoFiltro">
              <table class="table table-hover" id="tableEmpleados">
                <thead>
                  <tr>
                  
                <th>Documento del coach</th>
                <th>Documento del cliente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Total</th>
                  </tr>
                </thead>
              <?php
              require_once("../../../base_datos/bd.php");
              $daba = new database();
              $co = $daba ->conectar();
              session_start();
              $sqlTrabajadores = $co->prepare ('SELECT * FROM venta ORDER BY fecha ASC');
              $sqlTrabajadores ->execute();
              $query= $sqlTrabajadores->fetchall();
              $i =1;
                foreach ($query as $usu ) { ?>
                <tbody>
                  <tr>
                    
                <td><?= $usu['doc_coach'] ?></td>
                <td><?= $usu['doc_cliente'] ?></td>
                <td><?= $usu['fecha'] ?></td>
                <td><?= $usu['hora'] ?></td>
                <td><?= $usu['total'] ?></td>

                </tr>
                </tbody>
              <?php } ?>
              </table>
            </div>

            </div>
          </div>
      </section>




  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="assets/js/material.min.js"></script>
  <script>
  $(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


//FILTRANDO REGISTROS
$("#filtro").on("click", function(e){ 
  e.preventDefault();
  
  loaderF(true);

  var f_ingreso = $('input[name=fecha_ingreso]').val();
  var f_fin = $('input[name=fechaFin]').val();
  console.log(f_ingreso + '' + f_fin);

  if(f_ingreso !="" && f_fin !=""){
    $.post("filtro_venta.php", {f_ingreso, f_fin}, function (data) {
      $("#tableEmpleados").hide();
      $(".resultadoFiltro").html(data);
      loaderF(false);
    });  
  }else{
    $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
  }
} );


function loaderF(statusLoader){
    console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>

</body>
</html>