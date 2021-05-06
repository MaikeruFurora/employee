@extends('layouts.app')

@section('content')
<div class="container-fluid my-5 z-depth-1"><br>
  <div class="card mt-5">
    <div class="card-header card-header-primary p-2">
      <button class="btn btn-link btn-sm text-white font-weight-bold">
        EMPLOYEE LEAVE RECORD &nbsp;&nbsp;&nbsp;<em style="font-size: 15px"><b>"{{ $employee->name }}"</b></em>
      </button>
      {{-- <div class="float-right">
        <a  class="btn btn-success btn-sm">BACK TO LIST</a>
        <a  class="btn btn-secondary btn-sm text-dark">Export Excel File</a>
        <button style="background: black" class="btn btn-sm"  >Import CSV FIle</button>
        <a  class="btn btn-sm btn-danger">LAWOP</a>
        <button class="btn btn-info btn-sm">LEAVE FORM</button>
        <a class="btn btn-warning btn-sm">PRINT CARD</a>
      </div> --}}
      <div class="nav-tabs-navigation float-right">
        <div class="nav-tabs-wrapper">
          <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/employee') }}">
                <i class="material-icons">arrow_back</i>
                BACK
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#leaveCard">
                <i class="material-icons">create</i>
                LEAVE FORM
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="checkExport" href="#settings">
                <i class="material-icons">file_download</i>
                EXPORT EXCEL
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#settings" data-toggle="modal" data-target="#importLeaveRecords">
                <i class="material-icons">file_upload</i>
                IMPORT CSV
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lawop/{{ $employee->id }}">
                <i class="material-icons">view_list</i>
                LAWOP
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="printRecord">
                <i class="material-icons">print</i>
                PRINT LEAVE
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
    <div class="table-responsive"><!-- table-responsive -->
<table id="example" class="table table-bordered text-center table-striped" style="font-size: 12px" width="100%">
 <style type="text/css">
   .page-item .page-link{
    font-size: 10px;
    font-weight: bold;

   }
   .text-danger{
     color:red; 
    }
 </style>
  <input type="hidden" id="hideID" value="{{ $employee->id }}">
  <thead>
    <tr >
      <td style="background-color: #004d66" colspan="4" class="font-weight-bold text-white">VACATION SERVICE RENDERED</td>
      <td style="background-color: #4d6600" colspan="7" class="font-weight-bold text-white">RECORD OF LEAVE</td>
      <td style="background-color: #555e55" colspan="2" class="font-weight-bold text-white">EXTRA</td>
    </tr>
    <tr class="font-weight-bold text-white">
    <td style="background-color: #007399" width="8%">Inclusive Period</td>
    <td style="background-color: #007399" width="15%">Nature of Activitiy</td>
    <td style="background-color: #007399" width="5%">No.of Days Credited</td>
    <td style="background-color: #007399" width="5%">DSO No.</td>
    <td style="background-color: #86b300" width="13%">Inclusive Dates</td>
    <td style="background-color: #86b300" width="5%">No.of Days Leave</td>
    <td style="background-color: #86b300" width="6%">Service Credit Balance</td>
    <td style="background-color: #86b300" width="5%">Leave W/OUT PAY</td>
    <td style="background-color: #86b300" width="5%">Nature of Leave</td>
    <td style="background-color: #86b300" width="5%">DSO No.</td>
    <td style="background-color: #86b300" width="5%">Remarks</td>
    <td style="background-color: #738c73" width="2%">DELETE</td>
    <td style="background-color: #738c73" width="2%">EDIT</td>
  </tr>
  </thead>
</table>
    </div>
    </div>
  </div>
</div>
@include('record.leave.addRecord.index')
@include('record.leave.editRecord.index')
@include('record.leave.importRecord.index')
@endsection
@section('js')
<script src="{{ asset('js/record.js') }}"></script>
<script src="{{ asset('js/import.js') }}"></script>
@endsection