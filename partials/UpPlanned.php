<?php
// Conexion mysqli
include ('../config.php');
include ('../assets/funtions/funtionsPhp.php');


$pn = $_POST['pn'];
$id = $_POST['id'];

//Inserto registro en tabla pacientes 
$cadena = "UPDATE prodpl 
			SET 
                prod_status = 'Released'
			WHERE 
            pn = '$pn' AND id = '$id'";

$insertar = mysqli_query($conn, $cadena);


print_r(mysqli_error($conn));
mysqli_close($conn);
?>