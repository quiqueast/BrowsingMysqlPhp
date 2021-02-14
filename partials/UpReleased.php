<?php
// Conexion mysqli
include ('../config.php');
include ('../assets/funtions/funtionsPhp.php');


$pn = $_POST['pn'];
$user_name = $_POST['user_name'];
$id = $_POST['id'];

    $cadena = "UPDATE prodpl 
                SET 
                    prn_by = 'Radek Kornicki',
                    prod_status = 'Released'
                WHERE 
                pn = '$pn' AND id = '$id'";
    
    $insertar = mysqli_query($conn, $cadena);

//Inserto registro en tabla pacientes 


print_r(mysqli_error($conn));
mysqli_close($conn);
?>