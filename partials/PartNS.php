<?php
// Conexion mysqli
include ('../config.php');
$PartN = $_POST['PartN'];

$cadena = "SELECT children, parent, pn, qty, description, rev, pn_status, vo_spec, cust_spec
            FROM 
            plm_edms 
            where pn like '$PartN%' 
            order by pn asc";
$consultar = mysqli_query($conn, $cadena);
?>

                    <div class="table-responsive">
                     <table id='table-g' class="table table-borderles table-sm">
                        <thead>
                          <tr>
                            <th> Part No </th>
                            <th> Qty </th>
                            <th> Description </th>
                            <th> Rev </th>
                            <th> Status </th>
                            <th> V1 Doc. </th>
                            <th> Cust. Doc </th>
                          </tr>
                        </thead>
                        <tbody >
                            <?php
                            $n = 1;
                            while ($row = mysqli_fetch_array($consultar)){
                              
                              $pn              = $row[2];
                              $on = "onclick=btnN1('$pn-$n')";
                              $on3 = "onclick=btnN1Up('$pn-$n')";


                              if ($row[1] != "") {
                                $chkChecadoP3 = "<button type='button' $on3 id='id-$pn-$n' a = '0' up = '0'pn='$pn' class='btn btn-light btn-sm'> <i id='iconUp-$pn-$n' class='fas fa-chevron-up'></i></button>";
                              }else{
                                $chkChecadoP3 = "";
                              }
                              
                              if ($row[0] == 'YES') {
                                  $chkChecado    = "<button type='button' $on id='id-$pn-$n' a = '0' pn='$pn' class='btn btn-light btn-sm'> <i id='icon-$pn-$n' class='fas fa-chevron-right'></i></button>";
                                  $fri =  $chkChecado.' '.$pn.' '.$chkChecadoP3;
                              }else{
                                  $chkChecado    = "";
                                  $fri = $chkChecado.' '.$pn.' '.$chkChecadoP3;
                              }
                              $qty             = $row[3];
                              $description     = $row[4];
                              $rev             = $row[5];
                              $pn_status         = $row[6];
                              $vo_spec        = '<i class="fas fa-link"></i>';
                              $cust_spec        = '<i class="fas fa-link"></i>';
                            ?>
                          <tr id="R<?Php echo $pn.'-'.$n?>">
                            <td> <?php  echo $fri?> </td>
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
                        </tbody>
                      </table>
                    </div>


<?php
print_r(mysqli_error($conn));
mysqli_close($conn);
?>