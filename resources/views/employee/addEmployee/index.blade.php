<form id="addEmployee" autocomplete="off">@csrf
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add Employee</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="alertSuccess" class="alert alert-sm alert-success alert-dismissible fade show" role="alert">
          <strong>Successfull</strong> Just check if succesfully added.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
           <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" >
          </div><br>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputDateEmployed">Date Employed</label>
            <input type="text" name="dateEmployed" class="form-control" id="inputDateEmployed">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPosition4">Position</label>
              <input type="text" name="position" class="form-control" id="inputPosition4" >
            </div>
          </div>
          <br>
           <div class="form-group">
              <label>Sex</label>
              <select class="form-control" name="sex">
                <option selected>Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
           </div>
          <br>
          <div class="form-row">
            
            <div class="form-group col-md-6">
              <label>DOB</label>
              <input type="text" name="dob" class="form-control">
            </div>
            
            <div class="form-group col-md-6">
              <label>POB</label>
              <input type="text" name="pob" class="form-control">
            </div>

          </div>
          <br>
         <div class="form-row">
            
            <div class="form-group col-md-4">
              <label>Employee No.</label>
              <input type="Number" name="employeeNumber" class="form-control">
            </div>

            <div class="form-group col-md-4">
              <label>Station</label>
              <input type="text" name="station" class="form-control">
            </div>
            
            <div class="form-group col-md-4">
              <label>Civil Status</label>
              <input type="text" name="civilStatus" class="form-control">
            </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="submitform('addEmployee')" class="btn btn-sm btn-primary pl-3 pr-3">Save</button>
      </div>
    </div>
  </div>
</div>
</form>