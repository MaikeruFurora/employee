<form id="importLeaveFile" method="POST" autocomplete="off" enctype="multipart/form-data" accept=".xlsx">@csrf
<!-- Modal -->
<div class="modal fade" id="importLeaveRecords" tabindex="-1" role="dialog" aria-labelledby="importLeaveRecordsLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h6 class="modal-title" id="importLeaveRecordsLabel">Import CSV File</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
          <div class="custom-file" style="border: 1px solid black">
            <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
          <div class="alertloading m-2">
              <small class="text-primary">Please wait until process end!</small>
               <img class="ml-2" src="{{ asset('assets/img/spinner.gif') }}" width="20px" />
          </div>
          <small class="text-danger"></small>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="closeModal('importLeaveFile')" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="submitform('importLeaveFile')" class="btn btn-sm btn-primary pl-3 pr-3">Upload</button>
      </div>
    </div>
  </div>
</div>
</form>