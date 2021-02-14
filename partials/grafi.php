<?php
// Conexion mysqli
include ('../config.php');
include ('../assets/funtions/funtionsPhp.php');

$fecha_actual = date("Y-m-d");
    $fecha_actualche = date("Y-m-d",strtotime($fecha_actual."+ 0 day")); 
    $fecha_actualche=strtotime("$fecha_actualche");
    $fechaFin = date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 

    $fechaInicio = date("Y-m-d",strtotime($fecha_actual."- 1 month"));

    $fechaInicio=strtotime("$fechaInicio");

    $fechaFin=strtotime("$fechaFin");

$cadena = "SELECT 
                  prod_dt 
            FROM 
                  prodpl
            group by 
                  prod_dt";

$consultar = mysqli_query($conn, $cadena);
$a=1;
while ($row = mysqli_fetch_array($consultar)){


  $fe = $row[0];

    for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
?>
      <div class="slide">
          <div class="fluid-container">
                  <div class="row">
                    <div class="col">
                  
                      <div class="topp">
                        <p><?Php  echo mes(date("Y-m-d", $i));  ?></p>
                      </div>

<?php

  $cadena = " SELECT  
                      pr.id,
                      pr.pn,
                      pr.rev,
                      pr.lot_qty,
                      pr.prod_status,
                      pr.prn_by,
                      pr.prn_dt,
                      pr.prod_dt,
                      ed.description
                  from prodpl as pr
                  INNER JOIN plm_edms as ed on pr.pn = ed.pn
                  ORDER BY pr.prod_dt ";
                  
  $consultard = mysqli_query($conn, $cadena);

 
  $n = 1;
  while ($row = mysqli_fetch_array($consultard)){
    
    $id              = $row[0];
    $pn              = $row[1];
    $rev             = $row[2];
    $qty             = $row[3];
    $prod_status     = $row[4];
    $prn_by          = $row[5];
    $prn_dt          = $row[6];
    $prod_dts         = $row[7];
    $desc            = $row[8];
    $prod_dt         = mes($prod_dts);
    $prod_dt         = substr($prod_dt, 0, 6);


    $btnM = '<span class="btnModifi"pn="'.$pn.'"qty="'.$qty.'"dte ="'.date("Y-m-d", $i).'"da="'.mes(date("Y-m-d", $i)).'" ><img src="./assets/icons/edit.png"style="width: 35px;height: 24px; float: left; padding: 0px 0px 0px 13px;"></span>';

    if ($prod_status == 'Active') {
      $ico_pn_status ='<span typ="Active" id="'.$id.'" prn_by="'.$prn_by.'" pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/file_success.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
      $clas= 'background-color: darkseagreen;';
    }else {
      if ($prod_status == 'Planned') {
        $clas= 'background-color: rgb(139, 139, 139);';
        $ico_pn_status ='<span class="btnProdStatus" typ="Planned" id="'.$id.'" prn_by="'.$prn_by.'"  pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/success.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
      }
      if ($prod_status == 'Released') {

        $prod_dtche = date("Y-m-d",strtotime($prod_dts."+ 0 day"));
        $prod_dtche=strtotime("$prod_dtche");

        if($prn_by == null || $prn_dt == null ) {
          $clas= 'background-color: rgb(218, 215, 91);';
          $ico_pn_status ='<span class="btnProdStatus" typ="Released" id="'.$id.'" prn_by="'.$prn_by.'"  pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/file.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
        
            if ($prod_dtche < $fecha_actualche) {
            
              $ico_pn_status ='<span class="btnProdStatus" typ="Released" id="'.$id.'" prn_by="'.$prn_by.'"  pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/file.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
              $clas= 'background-color: red;';
            }  
            if ($prod_dtche == $fecha_actualche) {
                  $clas= 'background-color: rgb(218, 215, 91);';
                  $ico_pn_status ='<span typ="Released" id="'.$id.'" prn_by="'.$prn_by.'"  pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/file.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
            } 
        }elseif ($prn_by != null && $prn_dt != null )  {
            $clas= 'background-color: rgb(218, 215, 91);';
            $ico_pn_status ='<span class="btnProdStatus" typ="Released" id="'.$id.'" prn_by="'.$prn_by.'"  pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/file.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
          
            if ($prod_dtche < $fecha_actualche) {
                $btnM ='';
                $clas= 'background-color: burlywood;';
                $ico_pn_status ='';
            }
            if ($prod_dtche == $fecha_actualche) {
              $clas= 'background-color: darkseagreen;';
                $ico_pn_status ='<span typ="Released" id="'.$id.'" prn_by="'.$prn_by.'"  pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/file_success.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
            }
        }
        
      }
      if ($prod_status == 'Complete') {
        $clas= 'background-color: darkseagreen;';
        $ico_pn_status ='<span typ="Complete" id="'.$id.'" prn_by="'.$prn_by.'"  pn="'.$pn.'" dte ="'.date("Y-m-d", $i).'" ><img src="./assets/icons/file_success.png"  style="width: 35px;height: 24px; float: rigth; padding: 0px 0px 0px 13px;"></span>';
      }

    }

    if (mes(date("Y-m-d", $i)) == $prod_dt ) {
      if ($prod_status != null ) {

      

    ?>
                                              
        <div class="alineados" style="<?php echo $clas?>">
        <span></span>
            <p><?php echo $desc?></p>
            <p><?php echo $vr?></p>
          <p><strong>PN:&nbsp;</strong><?php echo $pn?></p>
          <p style="font-size: 15px;"><?php echo $qty?> LOTS</p> 
          

          <?php echo $btnM ?>
          <?php echo $ico_pn_status ?>
        </div>

                                                    
    <?php
      }
    }
      $n++;
      }
    ?>

          <span class="btnPlusModal"
                  dte ="<?php echo date("Y-m-d", $i);?>" 
                  da="<?php echo mes(date("Y-m-d", $i));?>">
                  <img src="./assets/icons/plus.png" 
                  style="width: 35px;height: 24px; margin: 0px 15px 0px 0px;padding: 0px 0px 0px 13px;">
          </span>

              </div>
              </div>
          </div>
        </div>
</div>
<?php
  }
  $a++;
}
?>

<script>
  $('span.btnPlusModal').on('click', function() {
    $('#confirm').attr('opt', 'add');

    $('#serachPn').val('');
    $('#qtyentre').val('');
    $('#descp').val('');

    dte = $(this).attr('da');
    dtes = $(this).attr('dte');

    $('#titulodelmodal').text('ADD PRODUCTION PLAN FOR '+dte.toUpperCase());
    $('#titulodelmodal').attr('dte',dtes);
    
    $('#modalFrom').modal('show');
  });

</script>
<script>
  $('span.btnModifi').on('click', function() {
    dte = $(this).attr('da');
    dtes = $(this).attr('dte');

    pn = $(this).attr('pn');
    qty = $(this).attr('qty');
    
    pn = $('#serachPn').val(pn);
    qty = $('#qtyentre').val(qty);
    
    $('#confirm').attr('opt', 'editar');

    $('#titulodelmodal').text('ADD PRODUCTION PLAN FOR '+dte.toUpperCase());
    $('#titulodelmodal').attr('dte',dtes);
    
    
    $('#modalFrom').modal('show');
    $('#searchMod').click();
  });

</script>
<script>
  $('span.btnProdStatus').on('click', function() {

    pn = $(this).attr('pn');
    id = $(this).attr('id');
    prn_by = $(this).attr('prn_by');

    key = $(this).attr('typ');

    switch (key) {
      case 'Planned':
        console.log(pn, id);
        $.ajax({
        type: "POST",
        url: "./partials/UpPlanned.php",
        data: { pn, id },
        dataType: "html",
          success: function(response) {
            window.location.href = './edms.php';

          }
        });
        break;
      case 'Released':
        console.log(pn, id, prn_by);
        $.ajax({
        type: "POST",
        url: "./partials/UpReleased.php",
        data: { pn, id, prn_by},
        dataType: "html",
          success: function(response) {
            window.location.href = './edms.php';

          }
        });
        break;
    
      default:
        break;
    }

  });

</script>

<?php
print_r(mysqli_error($conn));
mysqli_close($conn);
?>