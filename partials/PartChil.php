<?php
$space='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
include ('../config.php');
$pn = $_POST['pn'];

$cadena = "SELECT 
                  children, 
                  parent, 
                  qty, 
                  description, 
                  rev,
                  pn_status, 
                  vo_spec, 
                  cust_spec 
            FROM 
                  plm_edms 
            where pn = '$pn' AND parent != '(null)'";
$consultar = mysqli_query($conn, $cadena);
?>

                            <?php
                            $n = 1;
                            while ($row = mysqli_fetch_array($consultar)){
                              
                              $pn              = $row[1];
                              $qty             = $row[2];
                              $description     = $row[3];
                              $rev             = $row[4];
                              $pn_status         = $row[5];
                              $vo_spec        = '<i class="fas fa-link"></i>';
                              $cust_spec        = '<i class="fas fa-link"></i>';
                            ?>
                          <tr id="Rph<?Php echo $pn?>" class="removeCh remG remGP remGP3">
                            <td><?php  echo $space.$space.$pn  ?> </td>
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