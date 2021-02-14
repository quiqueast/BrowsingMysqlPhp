<?php
// Conexion mysqli
include ('../config.php');
include ('../assets/funtions/funtionsPhp.php');

$fecha_actual = date("Y-m-d");
    $fechaFin = date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 

    $fechaInicio = date("Y-m-d",strtotime($fecha_actual."- 1 month"));

    $fechaInicio=strtotime("$fechaInicio");

    $fechaFin=strtotime("$fechaFin");

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
$a=1;

  while ($row = mysqli_fetch_array($consultar)){
    
    $pn                = $row[0];
    $qty               = $row[1];
    $rev               = $row[2];
    $description       = $row[3];
    $children          = $row[4];
    $pn_designation    = $row[5];
    $pn_status         = $row[6];

?>
<div class="table-responsive">
                      
                      <table class="table table-borderles table-sm">
                          <thead>
                            <tr>
                              <th> Part No </th>
                              <th> Description </th>
                              <th> Qty </th>
                            </tr>
                          </thead>
  
                          <tbody >
                            <tr >
                                <td><?php echo $pn  ?> </td>
                                <td><?php echo $description?></td>
                                <td><?php echo $qty?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
    



<?php
  $a++;
  }
print_r(mysqli_error($conn));
mysqli_close($conn);
?>