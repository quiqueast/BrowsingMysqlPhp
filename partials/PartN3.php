<?php
// Conexion mysqli
include ('../config.php');
$pn = $_POST['pn'];

$cadena = "SELECT 
                  children, 
                  pn, 
                  qty, 
                  description, 
                  rev,
                  pn_status, 
                  vo_spec, 
                  cust_spec,
                  parent 
            FROM 
            plm_edms 
            where parent = '$pn'";
$consultar = mysqli_query($conn, $cadena);
?>

                            <?php
                            $n = 1;
                            while ($row = mysqli_fetch_array($consultar)){
                              
                              $pn              = $row[1];
                              $on = "onclick=btnPats3('$pn')";

                              if ($row[7] != ' ') {
                                $chkChecadoP3    = "<button type='button' $on id='id-$pn' a = '0' pn='$pn' class='btn btn-light btn-sm'> <i id='iconUp-$pn' class='fas fa-chevron-up'></i></button>";
                                $fri =  '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$pn.' &nbsp; '.$chkChecadoP3;
                              
                              }else{
                                $chkChecadoP3    =" ";
                                $fri = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$pn.' &nbsp; '.$chkChecadoP3;
                              }

                              $qty             = $row[2];
                              $description     = $row[3];
                              $rev             = $row[4];
                              $pn_status         = $row[5];
                              $vo_spec        = '<i class="fas fa-link"></i>';
                              $cust_spec        = '<i class="fas fa-link"></i>';
                            ?>
                          <tr id="Rph-<?Php echo $pn?>" class="removeCh remG remGP">
                            <td><?php  echo $fri?> </td>
                            <td style="text-align: center;"><?php  echo $qty?></td>
                            <td><?php echo $description?></td>
                            <td style="text-align: center;"> <?php echo $rev?></td>
                            <td style="text-align: center;"> <?php echo $pn_status?></td>
                            <td style="text-align: center;"> <?php echo $vo_spec?></td>
                            <td style="text-align: center;"> <?php echo $cust_spec?></td>
                          </tr>
                          <?php
                          $n++;
                          }
                          ?>

<?php
print_r(mysqli_error($conn));
mysqli_close($conn);
?>