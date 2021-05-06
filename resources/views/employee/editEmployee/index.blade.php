<form id="EditEmployeeForm" autocomplete="off">@csrf @method('PUT')
<!-- Modal -->
<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="editEmployeeLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h6 class="modal-title" id="editEmployeeLabel">Edit Employee</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="alertSuccessEdit" class="alert alert-sm alert-success alert-dismissible fade show text-center" role="alert" style="padding: 7px">
          <strong>Successfull</strong> Just check if succesfully Updated the data.
        </div>
           <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" id="name" name="name" class="form-control" id="inputName" >
          </div><br>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputDateEmployed">Date Employed</label>
            <input type="text" id="dateEmployed" name="dateEmployed" class="form-control" id="inputDateEmployed">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPosition4">Position</label>
              <input type="text" id="position" name="position" class="form-control" id="inputPosition4" >
            </div>
          </div>
          <br>
           <div class="form-group">
              <label for="inputState">Sex</label>
              <select id="inputState" class="form-control" id="sex" name="sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
           </div>
          <br>
          <div class="form-row">
            
            <div class="form-group col-md-6">
              <label for="inputCity">DOB</label>
              <input type="text" id="dob" name="dob" class="form-control" id="inputCity">
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputZip">POB</label>
              <input type="text" id="pob" name="pob" class="form-control" id="inputZip">
            </div>

          </div>
          <br>
         <div class="form-row">
            
            <div class="form-group col-md-4">
              <label for="inputZip">Employee No.</label>
              <input type="Number" id="employeeNumber" name="employeeNumber" class="form-control" id="inputZip">
            </div>

            <div class="form-group col-md-4">
              <label for="inputCity">Station</label>
              <input type="text" id="station" name="station" class="form-control" id="inputCity">
            </div>
            
            <div class="form-group col-md-4">
              <label for="inputZip">Civil Status</label>
              <input type="text" id="civilStatus" name="civilStatus" class="form-control" id="inputZip">
            </div>

          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" id="id">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="submitform('EditEmployeeForm')" class="btn btn-sm btn-primary pl-3 pr-3">Save</button>
      </div>
    </div>
  </div>
</div>
</form>