{{-- ============================== --}}

<form id="formLeaveCardEdit">@csrf
  @method('PUT')
  <div class="modal fade" id="leaveCardEdit" tabindex="-1" role="dialog" aria-labelledby="leaveCardLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="leaveCardLabel">EDIT Leave Form</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div id="alertEdit" class="alert alert-sm alert-success alert-dismissible fade show" role="alert">
              <strong>Successfull</strong> Updated the Data
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

           <h6 class="font-weight-bold">VACATION SERVICE RENDERED</h6><br>
          
            <div class="form-group">
                <label>Inclusive Period</label>
                <input type="text" name="inclusivePeriod" id="inclusivePeriod" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label>Nature of Activity</label>
                <input type="text" name="natureOfActivity" id="natureOfActivity" class="form-control form-control-sm" autocomplete="natureOfActivity">
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>No.of Days Credited</label>
                <input type="text" name="noOfDaysCredited" id="noOfDaysCredited" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                <label>DSO Number</label>
                <input type="text" name="dsoNumber1" id="dsoNumber1" class="form-control form-control-sm">
              </div>
            </div>
            <br>
            <h6 class="font-weight-bold">RECORD OF LEAVE</h6><br>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Inclusive Dates</label>
                <input type="text" name="inclusiveDates" id="inclusiveDates" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                <label>No.of Days Leave</label>
                <input type="text" name="noOfDaysLeave" id="noOfDaysLeave" class="form-control form-control-sm">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Service Credit Balance</label>
                <input type="text" name="serviceCreditBalance" id="serviceCreditBalance" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-6">
                <label>Leave W/OUT PAY</label>
                <input type="text" name="leaveWithoutpay" id="leaveWithoutpay" class="form-control form-control-sm">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Nature of Leave</label>
                <input type="text" name="natureOfLeave" id="natureOfLeave" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4">
                <label>DSO Number</label>
                <input type="text" name="dsoNumber2" id="dsoNumber2" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4">
                <label>Remarks</label>
                <select  name="remarks" id="remarks" class="form-control form-control-sm">
                  <option></option>
                  <option value="W/PAY">W/PAY</option>
                  <option value="W/OUT PAY">W/OUT PAY</option>
                  <option value="FULLPAY">FULLPAY</option>
                  <option value="REACHED">REACHED</option>
                  <option value="EXCEEDED">EXCEEDED</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="record_id" id="record_id">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="closeModal()" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="submitform('formLeaveCardEdit')" class="btn btn-sm btn-primary pl-5 pr-5">Save</button>
      </div>
    </div>
  </div>
</div>
</form>