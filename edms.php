<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EDMS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page ">
  <div class="pageHeader">
    <div class="title">V1 Electornic Document Management System</div>
    <div class="userPanel">
      <i class="fa fa-chevron-down"></i>
        <span class="username">Home</span>
    </div>
  </div>
  
  <div class="main">  
  <div class="nav" >
                <ul class="nav flex-column">
                  <li class="nav-item">
                      <button type="button" most="bars" class="btnMenu btn btn-outline-dark rounded-circle active" style="width: 80px;height: 80px;margin: 29px 60px;">
                        <i class="fas fa-chart-pie"style="font-size: 30px;" ></i>
                      </button>
                  </li>
                  <li class="nav-item">
                      <button type="button" most="searchs" class="btnMenu btn btn-outline-dark rounded-circle" style="width: 80px;height: 80px;margin: 29px 60px;">
                        <i class="fas fa-search"style="font-size: 30px;" ></i>
                      </button>        
                  </li>
                  <li class="nav-item">
                      <button type="button" class="btnMenu btn btn-outline-dark rounded-circle" style="width: 80px;height: 80px;margin: 29px 60px;">
                          <i class="fas fa-trash"style="font-size: 30px;" ></i>
                      </button>
                  </li>
                  <li class="nav-item">
                      <button type="button" class="btnMenu btn btn-outline-dark rounded-circle" style="width: 80px;height: 80px;margin: 29px 60px;">
                        <i class="fas fa-file-alt"style="font-size: 30px;" ></i>
                      </button>
                  </li>
                  <li class="nav-item">
                      <button type="button" class="btnMenu btn btn-outline-dark rounded-circle" style="width: 80px;height: 80px;margin: 29px 60px;">
                          <i class="fas fa-graduation-cap"style="font-size: 30px;" ></i>
                      </button>
                  </li>
                </ul>
              </div>


    <div class="view ">
      
      <div class=" container ">
        <section id="searchs" style="display:none;">
          <div class="row">
            <div class="col-7">
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Search by Part Number: </span>
                </div>
                <input type="text" id="PartN" placeholder="Enter Part" class="form-control">
              </div>
              <br>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Search by Description: </span>
                </div>
                <input type="text" id="Desc" placeholder="Enter Part" class="form-control">
              </div>
            </div>
            
            <div class="col-2">
              <br>
              <button type="button" id="bntBuscar" class="btn btn-outline-dark" style="width: 100px;height: 100px;">
                  <i class="fas fa-search"style="font-size: 30px;" ></i>
              </button>
            </div>
            
          </div>
            <br>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="conTabl">
                    
                    <div class="table-responsive">
                      
                    <table class="table table-borderles table-sm">
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

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="bars" class="content">
                      <div class="row">
                        <div class="col-2 ">
                                <button type="button" id="" class=" btn-prev btn btn-link" style="width: 80%;height: 100%;margin-top: 5px;margin-bottom: 5px;">
                                    <i class="fas fa-chevron-left" style="font-size: 150px;color: #343a40;"></i>
                                </button>
                        </div>
                        <div class="col-8">
                              <div class="card">
                                <div class="card-body">
                                  <div class="contener">
                                    <div id="carrusel" class="slider">
                                      <div id="carrusel-slides" class="slides">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                          </div>
                        </div>
                        <div class="col-2 ">
                                <button type="button" id="" class="btn-next btn btn-link" style="width: 80%;height: 100%;margin-top: 5px;margin-bottom: 5px;">
                                    <i class="fas fa-chevron-right" style="font-size: 150px; color: #343a40;"></i>
                                </button>
                        </div>
                      </div>
        </section>
      </div>
    </div>
</div>
<!-- partial -->
<?php
include ('./partials/modal.php');
?>
<script src="./assets/jq/jquery-3.5.1.js"></script>
<script src="./script.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://kit.fontawesome.com/cf1c1b2c69.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>
</html>
