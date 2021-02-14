<?php
// Conexion mysqli
include ('../config.php');
include ('../assets/funtions/funtionsPhp.php');


$pn = $_POST['pn'];
$dte = $_POST['dtes'];

//Inserto registro en tabla pacientes 
$cadena = "UPDATE prodpl 
			SET 
                prod_status = 'Complete'
			WHERE 
            pn = '$pn' AND prod_dt = '$dte'";

$insertar = mysqli_query($conn, $cadena);


print_r(mysqli_error($conn));
mysqli_close($conn);
?>