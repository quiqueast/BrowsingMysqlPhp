<?php
// Conexion mysqli
include ('../config.php');
include ('../assets/funtions/funtionsPhp.php');

$fecha_actual = date("Y-m-d");
  $fechaFin = date("Y-m-d",strtotime($fecha_actual."+ 0 day")); 

  $fechaInicio = date("Y-m-d",strtotime($fecha_actual."- 1 day"));


$pn = $_POST['pn'];
$dte = $_POST['dte'];
$qtyentre = $_POST['qtyentre'];

$cadena = "SELECT 
                pn, 
                qty,
                rev, 
                pn_designation
            FROM 
                plm_edms
            WHERE 
                pn = '$pn' and pn_status = 'Active'";

$consultar = mysqli_query($conn, $cadena);


  while ($row = mysqli_fetch_array($consultar)){
    
    $pn                = $row[0];
    $qty               = $row[1];
    $rev               = $row[2];
    $pn_designation    = $row[3];

  }

  if ($pn_designation == 'MS' || $pn_designation == "MPI") {
    if ($fechaFin >= $fechaInicio) {
        
        $cadenaMenu = "INSERT INTO prodpl 
                          (prod_dt, pn, rev, lot_qty, prod_status) 
                    values 
                          ('$dte', '$pn', '$rev', $qtyentre, 'Planned')";
        $consultarMenu = mysqli_query($conn, $cadenaMenu);
      
        $ver = 'sucess';

    }else{
      $ver = 'error';
    }

  }else {
    $ver = 'error';
  }

  echo $ver;
print_r(mysqli_error($conn));
mysqli_close($conn);
?>