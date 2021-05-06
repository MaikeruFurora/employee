<form id="cerfModal">@csrf
    <div class="modal fade" id="cerft" tabindex="-1" role="dialog" aria-labelledby="leaveCardLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Purpose of the Certification</label>
                    <input type="text" name="sampleInput" id="sampleInput" class="form-control form-control-sm">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="closeModal()" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" onclick="submitform('cerfModal')" class="btn btn-sm btn-primary pl-5 pr-5">print</button>
            </div>
          </div>
        </div>
      </div>
</form>