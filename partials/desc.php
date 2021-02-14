<?php
// Conexion mysqli
include ('../config.php');

$pn = $_POST['pn'];

$cadena = "SELECT 
                pn, 
                qty,
                rev, 
                description, 
                children, 
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
    $description       = $row[3];
    $children          = $row[4];
    $pn_designation    = $row[5];
    $pn_status         = $row[6];

  }

  echo $description;
print_r(mysqli_error($conn));
mysqli_close($conn);
?>