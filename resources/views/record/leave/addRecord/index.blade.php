<form id="formLeaveCard">@csrf
  <div class="modal fade" id="leaveCard" tabindex="-1" role="dialog" aria-labelledby="leaveCardLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="leaveCardLabel">Leave Form</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div id="alertSuccess" class="alert alert-sm alert-success alert-dismissible fade show text-center" role="alert" style="padding: 4px">
              <strong>Successfull</strong> Just check if succesfully added.
            </div>

           <h6 class="font-weight-bold">VACATION SERVICE RENDERED</h6><br>
          
             <div class="form-group">
                <label>Inclusive Period</label>
                <input type="text" name="inclusivePeriod" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label>Nature of Activity</label>
                <input type="text" name="natureOfActivity" class="form-control form-control-sm" autocomplete="natureOfActivity"><!---->
              </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>No.of Days Credited</label>
                <input type="number" name="noOfDaysCredited" id="add_noOfDaysCredited" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                <label>DSO Number</label>
                <input type="text" name="dsoNumber1" class="form-control form-control-sm">
              </div>
            </div>
            <br>
            <h6 class="font-weight-bold">RECORD OF LEAVE</h6><br>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Inclusive Dates</label>
                <input type="text" name="inclusiveDates" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                <label>No.of Days Leave</label>
                <input type="text" name="noOfDaysLeave" id="minus_noOfDaysLeave" class="form-control form-control-sm">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Service Credit Balance</label>
                <input type="text" name="serviceCreditBalance" id="last_serviceCreditBalance" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                <label>Leave W/OUT PAY</label>
                <input type="text" name="leaveWithoutpay" class="form-control form-control-sm">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Nature of Leave</label>
                <input type="text" name="natureOfLeave" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4">
                <label>DSO Number</label>
                <input type="text" name="dsoNumber2" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4">
                <label>Remarks</label>
                <select  name="remarks" class="form-control form-control-sm">
                  <option></option>
                  <option value="W/PAY">W/PAY</option>
                  <option value="W/OUT PAY">W/OUT PAY</option>
                  <option value="FULLPAY">FULLPAY</option>
                  <option value="REACHED">REACHED</option>
                  <option value="EXCEEDED">EXCEEDED</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="closeModal()" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="submitform('formLeaveCard')" class="btn btn-sm btn-primary pl-5 pr-5">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

