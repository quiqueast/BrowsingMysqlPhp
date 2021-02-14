<div class="modal fade" id="modalFrom" tabindex="-1" role="dialog" aria-labelledby="modalFromTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulodelmodal"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <center>

            <div class="dropdown-divider"></div>
            <div class="input-group mb-3 col-12">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">Enter product 'PN' to manafacture</span>
                </div>
                <input type="text" class="form-control" id="serachPn" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    
                    <button id="searchMod" class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"style="font-size: 20px;" ></i>
                    </button>

                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="input-group col-10">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description &nbsp;: </span>
                </div>
                    <span class="input-group-text"><center id="descp"></center></span>
            </div>
            <br>
            <div class="input-group mb-3 col-10">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">Enter QTY</span>
                </div>
                <input type="number" class="form-control" id="qtyentre" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3 col-10">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Select Customer</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            </center>
            <div class="dropdown-divider"></div>
            
            <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <center>  <h6> INVENTORY CHECK </h6> </center>
                  <div class="conTablmod" style="width: 100%;height: 200px;overflow-x: auto;">
                    <div class="table-responsive">
                      
                      <table class="table table-borderles table-sm">
                          <thead>
                            <tr>
                              <th> Part No </th>
                              <th> Description </th>
                              <th> Qty </th>
                            </tr>
                          </thead>

                          

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" id="closerModal" >Cancel</button>
        <button type="button" class="btn btn-primary" id ="confirm"> Confirm</button>
      </div>
    </div>
  </div>
</div>